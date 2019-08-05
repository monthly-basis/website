<?php
namespace LeoGalleguillos\Website\Model\Service;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;

class Website
{
    /**
     * @var WebsiteEntity\Website $websiteEntity
     */
    protected $websiteEntity;

    public function getWebsite(): WebsiteEntity\Website
    {
        return $this->websiteEntity;
    }

    public function setWebsite(
        WebsiteEntity\Website $websiteEntity
    ): WebsiteService\Website {
        $this->websiteEntity = $websiteEntity;
        return $this;
    }
}
