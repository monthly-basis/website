<?php
namespace LeoGalleguillos\Website\Model\Service\Webpage;

use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;

class Slug
{
    public function __construct(
        StringService\UrlFriendly $urlFriendlyService
    ) {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    /**
     * Get slug.
     *
     * @param WebsiteEntity\Webpage $webpageEntity
     * @return string;
     */
    public function getSlug(WebsiteEntity\Webpage $webpageEntity) : string
    {
        return $this->urlFriendlyService->getUrlFriendly(
            $webpageEntity->getTitle()
        );
    }
}
