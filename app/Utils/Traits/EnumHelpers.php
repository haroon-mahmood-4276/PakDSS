<?php

namespace App\Utils\Traits;

use Illuminate\Support\Str;

trait EnumHelpers
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array($withText = false): array
    {
        if (!$withText) {
            return array_combine(self::names(), self::values());
        }

        $enumArray = [];

        foreach (self::cases() as $case) {
            $enumArray[$case->value] = [
                'name' => $case->name,
                'text' => Str::of($case->value)->headline()->value()
            ];
        }

        return $enumArray;
    }

    public function text(): string
    {
        return Str::of($this->value)->headline()->value();
    }
}
