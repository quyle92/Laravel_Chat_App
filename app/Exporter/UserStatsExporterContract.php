<?php
namespace App\Exporter;

interface UserStatsExporterContract
{
	public function export(int $userId);
}