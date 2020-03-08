<?php

namespace ATP\LaravelPreset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Laravel\Ui\Presets\Preset;

class ATP extends Preset{

    public static function install()
    {
        static::cleanSassDirectory();
        static::updatePackages();
        static::updateMix();
        static::updateScripts();
    }

    public static function cleanSassDirectory()
    {
        File::cleanDirectory(resource_path('assets/sass'));
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    public static function updatePackageArray($packages)
    {
        //Add/Remove packages to package.json
        return ['laravel-mix-tailwind' => '^0.1.0'] + Arr::except($packages, [
            'jQuery'
        ]);
    }

    /**
     * Replace the webpack mix config
     */
    public static function updateMix()
    {
        copy(__DIR__.'/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Replace the js scripts
     */
    public static function updateScripts()
    {
        copy(__DIR__.'/stubs/app.js', resource_path('js/app.js'));
        copy(__DIR__.'/stubs/bootstrap.js', resource_path('js/bootstrap.js'));
    }
}
