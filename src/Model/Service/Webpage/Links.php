<?php
namespace LeoGalleguillos\Website\Model\Service\Webpage;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;

class Links
{
    public function getLinks(WebsiteEntity\Webpage $webpageEntity) : array
    {
        $links = [];

        preg_match_all(
            '/<a[^>]* href="([^"]+)"/',
            $webpageEntity->getHtmlEntity()->getString(),
            $matches
        );

        foreach ($matches[1] as $match) {
            if (!preg_match('/^https?:\/\//', $match)) {
                continue;
            }
            $links[] = $match;
        }

        return $links;
    }
}
