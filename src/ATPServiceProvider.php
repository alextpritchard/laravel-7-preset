<?php

namespace ATP\LaravelPreset;

use Illuminate\Support\ServiceProvider;
use Laravel\Ui\Presets\Preset;
use Laravel\Ui\UiCommand;

class ATPServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //"php artisan ui atp"

        UiCommand::macro('atp', function (UiCommand $command) {
            ATP::install();

            $command->info('ATP scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
