<?php
namespace LeoGalleguillos\Website\Model\Entity;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;

class Website
{
    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $domain;

    /**
     * @var int
     */
    public $facebookAppId;

    /**
     * @var string
     */
    public $googleAnalyticsTrackingId;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $productGroupId;

    /**
     * @var int
     */
    public $websiteId;

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    public function getFacebookAppId() : int
    {
        return $this->facebookAppId;
    }

    public function getGoogleAnalyticsTrackingId() : string
    {
        return $this->googleAnalyticsTrackingId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getProductGroupId()
    {
        return $this->productGroupId;
    }

    public function getWebsiteId()
    {
        return $this->websiteId;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function setFacebookAppId(int $facebookAppId) : WebsiteEntity\Website
    {
        $this->facebookAppId = $facebookAppId;
        return $this;
    }

    public function setDomain(string $domain)
    {
        $this->domain = $domain;
        return $this;
    }

    public function setGoogleAnalyticsTrackingId(string $googleAnalyticsTrackingId)
    {
        $this->googleAnalyticsTrackingId = $googleAnalyticsTrackingId;
        return $this;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function setProductGroupId(int $productGroupId)
    {
        $this->productGroupId = $productGroupId;
        return $this;
    }

    public function setWebsiteId(int $websiteId)
    {
        $this->websiteId = $websiteId;
        return $this;
    }
}
