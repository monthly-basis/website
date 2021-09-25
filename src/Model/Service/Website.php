<?php
namespace MonthlyBasis\Website\Model\Service;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Service as WebsiteService;

class Website
{
    protected WebsiteEntity\Website $websiteEntity;

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
