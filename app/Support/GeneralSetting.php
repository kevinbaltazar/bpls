<?php

namespace App\Support;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public int $captain;
    
    public int $secretary;
    
    public static function group(): string
    {
        return 'general';
    }
}
