<?php
namespace App\Exporter;

class Translator 
{

    /** @var Translator */
    private $language;

    public function __construct(string $language)
    {
        $this->language = $language;
    }

}