<?php
namespace App\Exporter;

class UserStatsCsvExporter implements UserStatsExporterContract
{

    /** @var Translator */
    private $translator;

    public function __construct(Translator $translator)
    {
        $this->translator = $translator;
    }

    public function export(int $userId)
    {
        // Load user statistics...
        return 'Export user #' . $userId . ' statistics as csv.';
    }
}