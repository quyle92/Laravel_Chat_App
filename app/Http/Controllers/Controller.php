<?php

namespace App\Http\Controllers;

use App\Exporter\UserStatsExporterContract;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class Controller extends BaseController
{
	private  $userStatsExporter;

    public function handle( UserStatsExporterContract  $userStatsExporter  )
    {
    	return $userStatsExporter->export(12);
    }
}
