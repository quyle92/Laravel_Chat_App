<?php

namespace App\Providers;

use App\Exporter\Translator;
use App\Exporter\UserStatsCsvExporter;
use App\Exporter\UserStatsExporterContract;
use App\Exporter\UserStatsXmlExporter;
use Illuminate\Support\ServiceProvider;

class UserStatsExporterProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserStatsExporterContract::class, function(){
            return new UserStatsCsvExporter(new Translator(config('app.locale')));
        });

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
