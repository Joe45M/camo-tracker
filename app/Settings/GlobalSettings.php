<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GlobalSettings extends Settings
{

    public array $home_posts;

    public static function group(): string
    {
        return 'general';
    }
}
