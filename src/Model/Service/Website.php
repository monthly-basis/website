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

    public function __construct(
        WebsiteFactory\Website $websiteFactory
    ) {
        $this->websiteFactory = $websiteFactory;
    }

    public function getInstance() : WebsiteEntity\Website
    {
        if ($this->websiteEntity) {
            return $this->websiteEntity;
        }

        $this->websiteEntity = $this->websiteFactory->buildFromDomain();
        return $this->websiteEntity;
    }

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
