<?php

namespace App\Support;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public int $captain = 0;

    public int $secretary = 0;

    public static function group(): string
    {
        return 'general';
    }
}
