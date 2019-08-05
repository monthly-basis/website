<?php
namespace LeoGalleguillos\Website\Model\Service;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;

class FromDomain
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

    public function getWebsite(): WebsiteEntity\Website
    {
        if ($this->websiteEntity) {
            return $this->websiteEntity;
        }

        $this->websiteEntity = $this->websiteFactory->buildFromDomain();
        return $this->websiteEntity;
    }
}
