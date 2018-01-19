<?php
namespace LeoGalleguillos\Website\Model\Service\Webpage;

class Html
{
    public function getHtml(string $url) : string
    {
        return file_get_contents($url);
    }
}
