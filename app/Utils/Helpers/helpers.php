<?php

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\{Collection};
use Illuminate\Support\Facades\Cache;

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

if (!function_exists('settings_update')) {
    function settings_update(array|string $keys, array|string $values)
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

if (!function_exists('filter_strip_tags')) {

    function filter_strip_tags($text, $with_script_content = false): string
    {
        $pattern = [
            '@<[\/\!]*?[^<>]*?>@si',           // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU',  // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@',       // Strip multi-line comments
        ];

        if ($with_script_content) {
            $pattern[] = '@<script[^>]*?>.*?</script>@si';
        }

        return preg_replace($pattern, '', $text);
    }
}

if (!function_exists('filter_script_tags')) {

    function filter_script_tags($text): string
    {
        $pattern = [
            '@<script[^>]*?>.*?</script>@si',
        ];

        return preg_replace($pattern, '', $text);
    }
}

if (!function_exists('encode_html_entities')) {

    function encode_html_entities($field): string
    {
        return trim(htmlentities($field));
    }
}

if (!function_exists('decode_html_entities')) {

    function decode_html_entities($field): string
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
        $Modelpath = ($path ?? app_path()) . '/Models';

        $out = [];
        $results = scandir($Modelpath);
        foreach ($results as $result) {
            //			dd($results);
            if ($result === '.' or $result === '..') {
                continue;
            }
            $filename = $Modelpath . '/' . $result;
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

        // $model = "\\App\\Models\\" . $model;
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
        $parents = $data->whereNull('parent_id')->map(function ($parent) use ($data) {
            $parent['children'] = getChildFromParent($data, $parent);
            return $parent;
        });
        return $parents;
    }
}

if (!function_exists('getChildFromParent')) {
    function getChildFromParent(collection $data, $parent)
    {
        $parents = $data->where('parent_id', $parent->id)->map(function ($parent) use ($data) {
            $parent['children'] = getChildFromParent(collect($data), $parent);
            return $parent;
        });

        return $parents;
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

// if (!function_exists('makeImageThumbs')) {
//     function makeImageThumbs($request, $key = ""): string
//     {
//         $publicPath = public_path('public_assets/admin/sites_images') . DIRECTORY_SEPARATOR;
//         if (!is_string($request)) {
//             if (is_array($request)) {
//                 $image = $request[$key];
//             } else {
//                 $image = $request->file($key);
//             }
//             $imageHashedName = $image->hashName();
//         } else {
//             $image = $publicPath . $request;
//         }

//         $imgExplodedName = explode(".", $imageHashedName);

//         $img = Image::make($image)->backup();

//         $img->resize(1000, null, function ($constraint) {
//             $constraint->aspectRatio();
//             $constraint->upsize();
//         })->save($publicPath . $imgExplodedName[0] . '-thumbs1000.' . $imgExplodedName[1]);
//         $img->reset();

//         $img->resize(600, null, function ($constraint) {
//             $constraint->aspectRatio();
//             $constraint->upsize();
//         })->save($publicPath . $imgExplodedName[0] . '.' . $imgExplodedName[1]);
//         $img->reset();

//         $img->resize(350, null, function ($constraint) {
//             $constraint->aspectRatio();
//             $constraint->upsize();
//         })->save($publicPath . $imgExplodedName[0] . '-thumbs350.' . $imgExplodedName[1]);
//         $img->reset();

//         $img->resize(200, null, function ($constraint) {
//             $constraint->aspectRatio();
//             $constraint->upsize();
//         })->save($publicPath . $imgExplodedName[0] . '-thumbs200.' . $imgExplodedName[1]);
//         $img->reset();

//         $img->destroy();

//         return $imgExplodedName[0] . '.' . $imgExplodedName[1];
//     }
// }

if (!function_exists('deleteImageThumbs')) {
    function deleteImageThumbs($imgName, $imageDirectory = 'admin'): string
    {
        $publicServerPath = public_path('public_assets/' . $imageDirectory . '/sites_images') . DIRECTORY_SEPARATOR;
        if (File::exists($publicServerPath . $imgName)) {
            $imageExplodedName = explode('.', $imgName);
            // dd($imageExplodedName);
            File::delete([
                $publicServerPath . $imageExplodedName[0] . '.' . $imageExplodedName[1],
                $publicServerPath . $imageExplodedName[0] . '-thumbs1000.' . $imageExplodedName[1],
                $publicServerPath . $imageExplodedName[0] . '-thumbs350.' . $imageExplodedName[1],
                $publicServerPath . $imageExplodedName[0] . '-thumbs200.' . $imageExplodedName[1],
            ]);

            return true;
        }

        return false;
    }
}

if (!function_exists('getImageByName')) {
    function getImageByName($imgName, $imageDirectory = 'admin'): array
    {
        $img = '';
        $imgThumb = '';
        $publicServerPath = public_path('public_assets/' . $imageDirectory . '/sites_images') . DIRECTORY_SEPARATOR;
        $publicLinkPath = asset('public_assets/' . $imageDirectory . '/sites_images') . DIRECTORY_SEPARATOR;

        $imageExplodedName = explode('.', (!is_null($imgName) && !empty($imgName) ? $imgName : 'TelK7BnW63IAN6zuTTwJkqZeuM0YI5aNc7aFqOyz.jpg'));

        if (File::exists($publicServerPath . ($imageExplodedName[0] . '-thumbs200.' . $imageExplodedName[1]))) {
            $img = $publicLinkPath . $imageExplodedName[0] . '-thumbs1000.' . $imageExplodedName[1];
            $imgThumb = $publicLinkPath . $imageExplodedName[0] . '-thumbs200.' . $imageExplodedName[1];
        } elseif (File::exists($publicServerPath . ($imageExplodedName[0] . '.' . $imageExplodedName[1]))) {
            $img = $publicLinkPath . $imageExplodedName[0] . '.' . $imageExplodedName[1];
            $imgThumb = $publicLinkPath . $imageExplodedName[0] . '.' . $imageExplodedName[1];
        } else {
            $img = $publicLinkPath . 'do_not_delete/do_not_delete.png';
            $imgThumb = $publicLinkPath . 'do_not_delete/do_not_delete.png';
        }

        return [$img, $imgThumb];
    }
}

if (!function_exists('editDateColumn')) {
    function editDateColumn($date)
    {
        $date = new Carbon($date);

        return '<span>' . $date->format('H:i:s') . "</span> <br> <span class='text-primary fw-bold'>" . $date->format('Y-m-d') . '</span>';
    }
}

if (!function_exists('editImageColumn')) {
    function editImageColumn($image, $name = '', $width = 100)
    {
        return "<img style='border: 1px dashed #eee;border-radius: 10px' src='" . $image . "' alt='" . $name . "' width='" . $width . "'>";
    }
}

if (!function_exists('editStatusColumn')) {
    function editStatusColumn($status)
    {
        $badge = '';
        switch ($status) {
            case 'yes':
                $badge = "<span class='badge bg-success bg-glow me-1'>" . __('lang.commons.yes') . '</span>';
                break;

            case 'no':
                $badge = "<span class='badge bg-danger bg-glow me-1'>" . __('lang.commons.no') . '</span>';
                break;

            case 'active':
                $badge = "<span class='badge bg-success bg-glow me-1'>" . __('lang.commons.active') . '</span>';
                break;

            case 'inactive':
                $badge = "<span class='badge bg-danger bg-glow me-1'>" . __('lang.commons.inactive') . '</span>';
                break;

            case 'objected':
                $badge = "<span class='badge bg-danger bg-glow me-1'>" . __('lang.commons.objected') . '</span>';
                break;

            case 'pending_approval':
                $badge = "<span class='badge bg-warning bg-glow me-1'>" . __('lang.commons.pending_approval') . '</span>';
                break;

            default:
                $badge = "<span class='badge bg-primary bg-glow me-1'>" . $status . '</span>';
                break;
        }

        return $badge;
    }
}

if (!function_exists('editBadgeColumn')) {
    function editBadgeColumn($value)
    {
        return "<span class='badge bg-primary bg-glow me-1'>" . $value . '</span>';
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

if (!function_exists('getNHeightestNumber')) {
    function getNHeightestNumber($numberOfDigits = 1)
    {
        return (int) str_repeat('9', $numberOfDigits);
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

if (!function_exists('sqlErrorMessagesByCode')) {
    function sqlErrorMessagesByCode($errCode)
    {
        $messages = [
            '1062' => 'Duplicate entry',
            '1452' => 'Cannot add or update a child row',
            '1451' => 'Cannot delete or update a parent row',
            '1364' => 'Field does not have a default value',
            '1048' => 'Column cannot be null',
            '1054' => 'Unknown column',
            '1052' => 'Column in where clause is ambiguous',
            '1051' => 'Unknown table',
            '1050' => 'Table already exists',
            '1046' => 'No database selected',
            '1045' => 'Access denied for user',
            '1044' => 'Access denied for user',
            '1042' => 'Cannot get hostname for your address',
            '1040' => 'Too many connections',
            '1038' => 'Out of sort memory, consider increasing server sort buffer size',
            '1036' => 'Table is read only',
            '1035' => 'CRASHED ON USAGE',
            '1034' => 'CRASHED ON REPAIR',
            '1033' => 'Out of memory; restart server and try again (needed 98304 bytes)',
            '23505' => 'Data already exists',
        ];

        return $messages[$errCode] ?? 'Unknown error';
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

if (!function_exists('getIconDirection')) {
    function getIconDirection($direction)
    {
        if ($direction == 'ltr') {
            return 'right';
        } else {
            return 'left';
        }
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
