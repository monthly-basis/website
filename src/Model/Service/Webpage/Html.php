<?php
namespace LeoGalleguillos\Website\Model\Service\Webpage;

class Html
{
    public function getHtmlFromUrl(string $url) : string
    {
        return file_get_contents($url);
    }
}
