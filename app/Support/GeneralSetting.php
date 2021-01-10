<?php

namespace App\Support;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public string $site_name;
    
    public bool $site_active;
    
    public static function group(): string
    {
        return 'general';
    }
}

class IndexController
{
    public function __invoke(GeneralSettings $settings){
        return view('index', [
            'site_name' => $settings->site_name,
        ]);
    }
}