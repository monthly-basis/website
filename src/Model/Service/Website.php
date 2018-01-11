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

    /**
     * Get instance.
     *
     * @return WebsiteEntity\Website
     */
    public function getInstance() : WebsiteEntity\Website
    {
        if ($this->websiteEntity) {
            return $this->websiteEntity;
        }

        $this->websiteEntity = $this->websiteFactory->buildFromDomain();
        return $this->websiteEntity;
    }
}
