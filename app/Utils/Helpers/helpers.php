<?php

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\{Cache, Crypt, File};
use Illuminate\Support\{Collection};
use Illuminate\Support\Str;

if (!function_exists('settings')) {
    function settings($key, $overrideCache = false)
    {
        if ($overrideCache) {
            return (new Setting())->firstWhere('key', $key)->value;
        }

        return Cache::rememberForever($key, function () use ($key) {
            return (new Setting())->firstWhere('key', $key)->value;
        });
    }
}

if (!function_exists('settingsUpdate')) {
    function settingsUpdate(array|string $keys, array|string $values)
    {
        if (is_array($keys) && is_array($values)) {
            $settings = array_combine($keys, $values);
            foreach ($settings as $key => $value) {
                (new Setting())->firstWhere('key', $key)->update([
                    'value' => $value
                ]);
                # code...
            }
        } else {
            (new Setting())->firstWhere('key', $keys)->update([
                'value' => $values
            ]);
        }
        cache()->flush();
        return true;
    }
}

if (!function_exists('getLastCategoryBreadcrumb')) {
    function getLastCategoryBreadcrumb($categories, $parentId = null)
    {
        $breadcrumb = [];

        foreach ($categories as $category) {
            if ($category['parent_id'] == $parentId) {
                $childBreadcrumb = getLastCategoryBreadcrumb($categories, $category['id']);
                if (!empty($childBreadcrumb)) {
                    $breadcrumb = array_merge([$category], $childBreadcrumb);
                } else {
                    $breadcrumb = [$category];
                }
            }
        }

        return $breadcrumb;
    }
}

if (!function_exists('gravatar')) {
    function gravatar($email)
    {
        $hash = md5(strtolower(trim($email)));
        return "http://www.gravatar.com/avatar/$hash?s=200";
    }
}

if (!function_exists('filterScriptTags')) {

    function filterScriptTags($text): string
    {
        $pattern = [
            '@<script[^>]*?>.*?</script>@si',
        ];

        return preg_replace($pattern, '', $text);
    }
}

if (!function_exists('encodeHtmlEntities')) {

    function encodeHtmlEntities($field): string
    {
        return trim(htmlentities($field));
    }
}

if (!function_exists('decodeHtmlEntities')) {

    function decodeHtmlEntities($field): string
    {
        return trim(html_entity_decode($field));
    }
}

if (!function_exists('numberToWords')) {

    function numberToWords($number): string
    {
        return (new NumberFormatter('en', NumberFormatter::SPELLOUT))->format($number);
    }
}

if (!function_exists('englishCounting')) {

    function englishCounting($number): string
    {
        $notation = '';
        switch ($number) {
            case 1:
                $notation = '1st';
                break;

            case 2:
                $notation = '2nd';
                break;

            case 3:
                $notation = '3rd';
                break;

            default:
                $notation = $number . 'th';
                break;
        }

        return $notation;
    }
}

if (!function_exists('encryptParams')) {
    function encryptParams($params): array|string
    {
        if (is_array($params)) {
            $data = [];
            foreach ($params as $key => $item) {
                if (Str::isUuid($params)) {
                    $data[$key] = $params;
                } else {
                    $data[$key] = Crypt::encryptString($params);
                }
            }

            return $data;
        }
        if (Str::isUuid($params)) {
            return $params;
        }

        return Crypt::encryptString($params);
    }
}

if (!function_exists('decryptParams')) {
    function decryptParams($params): array|string
    {
        if (is_array($params)) {
            $data = [];
            foreach ($params as $key => $item) {
                if (Str::isUuid($params)) {
                    $data[$key] = $params;
                } else {
                    $data[$key] = Crypt::decryptString($params);
                }
            }

            return $data;
        }
        if (Str::isUuid($params)) {
            return $params;
        }

        return Crypt::decryptString($params);
    }
}

if (!function_exists('getModel')) {
    function getModel($model = null): Model
    {
        return app("App\Models\\" . Str::of($model)->lower()->singular()->ucfirst());
    }
}

if (!function_exists('getAllModels')) {
    function getAllModels($path = null): array
    {
        $modelpath = ($path ?? app_path()) . '/Models';

        $out = [];
        $results = scandir($modelpath);
        foreach ($results as $result) {
            if ($result === '.' || $result === '..') {
                continue;
            }
            $filename = $modelpath . '/' . $result;
            if (is_dir($filename)) {
                $out = array_merge($out, getAllModels($filename));
            } else {
                $out[] = substr($result, 0, -4);
            }
        }

        return $out;
    }
}

if (!function_exists('getTrashedDataCount')) {
    function getTrashedDataCount(): float|int
    {
        $trashed = [];
        foreach (getAllModels() as $model) {
            $models = app("App\Models\\" . $model);
            if (in_array('Illuminate\Database\Eloquent\SoftDeletes', class_uses($models))) {
                $trashed[] = $models->onlyTrashed()->count();
            } else {
                $trashed[] = 0;
            }
        }

        return array_sum($trashed);
    }
}

if (!function_exists('prepareLinkedTree')) {
    function prepareLinkedTree(collection $collectionData, $model, $queryFromDB = false, $includeOnlyLast = false)
    {

        $typesTmp = [];
        
        $dbTypes = ($queryFromDB ? $model::all() : $collectionData);

        foreach ($collectionData as $key => $row) {
            $tmpLinkedTree = ($queryFromDB ? prepareTreeFromEloquent($model, $row, $row->name, $collectionData, $dbTypes) : prepareTreeFromCollection(row: $row, name: $row->name, parent: $collectionData, includeOnlyLast: $includeOnlyLast));
            if (is_null($tmpLinkedTree)) {
                continue;
            }
            $typesTmp[$key] = $row;
            $typesTmp[$key]['tree'] = $tmpLinkedTree;
        }

        return $typesTmp;
    }
}

if (!function_exists('prepareTreeFromEloquent')) {
    function prepareTreeFromEloquent($model, $row, $name, collection $parent, $dbTypes, $index = 1)
    {
        if ($index == 1 && !is_null($parent->firstWhere('parent_id', $row->id))) {
            return null;
        }

        if ($row->parent_id == 0) {
            return $name;
        }

        $nextRow = $model::find($row->parent_id);
        $name = $nextRow->name . ' > ' . $name;

        return prepareTreeFromEloquent($model, $nextRow, $name, $parent, $dbTypes, ++$index);
    }
}

if (!function_exists('prepareTreeFromCollection')) {
    function prepareTreeFromCollection($row, $name, collection $parent, $index = 1, $includeOnlyLast = false)
    {
        if ($includeOnlyLast && $index == 1 && !is_null($parent->firstWhere('parent_id', $row->id))) {
            return null;
        }

        if (is_null($row->parent_id)) {
            return $name;
        }

        $nextRow = $parent->firstWhere('id', $row->parent_id);

        $name = (is_null($nextRow) ?? empty($nextRow) ? '' : $nextRow->name) . ' > ' . $name;
        if (is_null($nextRow) ?? empty($nextRow)) {
            return $name;
        }

        return prepareTreeFromCollection($nextRow, $name, $parent, ++$index);
    }
}

if (!function_exists('getLinkedTreeData')) {
    function getLinkedTreeData(Model $model, $id = [])
    {
        $id = $model::whereIn('parent_id', $id)->get()->toArray();
        if (count($id) > 0) {
            return array_merge($id, getLinkedTreeData($model, array_column($id, 'id')));
        }

        return $id;
    }
}

if (!function_exists('getParentWithChildHierarchy')) {
    function getParentWithChildHierarchy($model)
    {
        $data = collect($model::all());
        return $data->whereNull('parent_id')->map(function ($parent) use ($data) {
            $parent['children'] = getChildFromParent($data, $parent);
            return $parent;
        });
    }
}

if (!function_exists('getChildFromParent')) {
    function getChildFromParent(collection $data, $parent)
    {
        return $data->where('parent_id', $parent->id)->map(function ($parent) use ($data) {
            $parent['children'] = getChildFromParent(collect($data), $parent);
            return $parent;
        });
    }
}

if (!function_exists('base64ToImage')) {
    function base64ToImage($image): string
    {
        ini_set('memory_limit', '256M');
        $filename = 'TelK7BnW63IAN6zuTTwJkqZeuM0YI5aNc7aFqOyz.jpg';
        if (!empty($image)) {
            $dir = $_SERVER['DOCUMENT_ROOT'] . config('app.asset_url') . DIRECTORY_SEPARATOR . 'public_assets/admin/sites_images';
            $image_parts = explode(';base64,', $image);
            $image_type_aux = explode('image/', $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filename = uniqid() . '.' . $image_type;
            $file = $dir . DIRECTORY_SEPARATOR . $filename;
            file_put_contents($file, $image_base64);
        }

        return $filename;
    }
}

if (!function_exists('getParentByParentId')) {
    function getParentByParentId($parent_id, $model)
    {
        $role = $model::where('id', $parent_id)->first();
        if ($role) {
            return $role->name;
        }

        return 'parent';
    }
}

if (!function_exists('apiErrorResponse')) {
    function apiErrorResponse($data = null, $message = 'data not found', $code = 200, $key = 'error')
    {
        return response()->json(
            [
                'status' => false,
                'message' => [
                    $key => $message,
                ],
                'data' => $data,
                'status_code' => $code,
            ],
            $code
        );
    }
}

if (!function_exists('apiSuccessResponse')) {
    function apiSuccessResponse($data = null, $message = 'data found', $code = 200, $key = 'success')
    {
        return response()->json(
            [
                'status' => true,
                'message' => [
                    $key => $message,
                ],
                'data' => $data,
                'status_code' => $code,
            ],
            $code
        );
    }
}

if (!function_exists('actionLog')) {
    function actionLog($logName, $causedByModel, $performedOnModel, $log, $properties = [], $event = '')
    {
        return activity()
            ->causedBy($causedByModel)
            ->performedOn($performedOnModel)
            ->inLog($logName)
            ->event($event)
            ->withProperties($properties)
            ->log($log);
    }
}

if (!function_exists('calculateDiscountPercentage')) {
    function calculateDiscountPercentage($price, $discounted_price)
    {
        return round((($price - $discounted_price) / $price) * 100, 2);
    }
}

if (!function_exists('getDoNotDeleteImage')) {
    function getDoNotDeleteImage()
    {
        return asset('admin-assets/img/do_not_delete/do_not_delete.png');
    }
}

if (!function_exists('getImageUrlByCollection')) {
    function getImageUrlByCollection($model, string $collection = 'default', $first = false)
    {
        $images = $model->getMedia($collection);

        if ($images->count() > 0) {
            if ($first) {
                return $images->first()->getFullUrl();
            }
            return $images->map(function ($image) {
                return $image->getFullUrl();
            });
        }

        return asset('admin-assets/img/do_not_delete/do_not_delete.png');
    }
}

if (!function_exists('currencyParser')) {
    function currencyParser($amount, $decimals = 2, $symbol = '$')
    {
        $amount = floatval($amount);
        if ($amount < 1) {
            $amount = 0;
        }

        return $symbol . ' ' . number_format($amount, $decimals);
    }
}
