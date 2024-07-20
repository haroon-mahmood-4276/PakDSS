<?php

use Carbon\Carbon;
use Illuminate\Support\Str;

if (!function_exists('editDateTimeColumn')) {
    function editDateTimeColumn($date, $dateFormat = 'Y-m-d', $timeFormat = 'H:i:s', $withBr = true, $order = 'TD')
    {
        if (($date instanceof Carbon ? $date->timestamp : $date) < 1) {
            return '-';
        }

        $date = Carbon::parse($date)->setTimezone(config('app.timezone'));
        switch ($order) {
            case 'TD':
                $formatedDate = "<span>" . $date->format($timeFormat) . "</span> " . ($withBr ? '<br>' : "") . " <span class='text-primary fw-bold'>" . $date->format($dateFormat) . "</span>";
                break;

            case 'DT':
                $formatedDate = "<span class='text-primary fw-bold'>" . $date->format($dateFormat) . "</span> " . ($withBr ? '<br>' : "") . " <span>" . $date->format($timeFormat) . "</span>";
                break;

            default:
                $formatedDate = $date->format($timeFormat) . " " . ($withBr ? '<br>' : "") . " " . $date->format($dateFormat);
                break;
        }
        return $formatedDate;
    }
}

if (!function_exists('editPaymentColumn')) {
    function editPaymentColumn($amount, $decimals = 0, $symbol = '$')
    {
        if ($amount < 1) {
            return '-';
        }

        return $symbol . ' ' . number_format($amount, $decimals);
    }
}

if (!function_exists('editTitleColumn')) {
    function editTitleColumn($string)
    {
        if (is_null($string)) {
            return '-';
        } elseif (is_string($string)) {
            return Str::of($string)->replace('_', ' ')->title();
        }
    }
}

if (!function_exists('editTimeColumn')) {
    function editTimeColumn($date)
    {
        if (($date instanceof Carbon ? $date->timestamp : $date) < 1) {
            return '-';
        }

        $date = new Carbon($date);

        return "<span>" . $date->format('H:i:s') . "</span>";
    }
}

if (!function_exists('editDateTimeColumn')) {
    function editDateTimeColumn($date, $format = 'Y-m-d')
    {
        if (($date instanceof Carbon ? $date->timestamp : $date) < 1) {
            return '-';
        }

        $date = new Carbon($date);

        return "<span class='text-primary fw-bold'>" . $date->format($format) . "</span>";
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
            case 'pending_approval':
                $badge = editBadgeColumn('Pending Approval', 'warning');
                break;
                
            case 'yes':
                $badge = editBadgeColumn('Yes', 'success');
                break;

            case 'no':
                $badge = editBadgeColumn('No', 'danger');
                break;

            case 'active':
                $badge = editBadgeColumn('Active', 'success');
                break;

            case 'inactive':
                $badge = editBadgeColumn('Inactive', 'danger');
                break;

            case 'objected':
                $badge = editBadgeColumn('Objected', 'danger');
                break;

            default:
                $badge = editBadgeColumn($status);
                break;
        }
        return $badge;
    }
}

if (!function_exists('editBadgeColumn')) {
    function editBadgeColumn($value, $color = 'primary')
    {
        return "<span class='badge bg-glow bg-" . $color . " me-1'>" . $value . "</span>";
    }
}
