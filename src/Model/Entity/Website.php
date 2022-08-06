<?php
namespace MonthlyBasis\Website\Model\Entity;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;

class Website
{
    /**
     * @var string
     */
    protected $amazonTrackingId;

    protected string $country;

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
    protected $environmentId;

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
    protected $googleTagManagerId;

    /**
     * @var array
     */
    protected $metadata;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    public $name;

    protected string $shortName;

    /**
     * @var int
     */
    public $websiteId;

    public function getAmazonTrackingId()
    {
        return $this->amazonTrackingId;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDomain()
    {
        return $this->domain;
    }

    public function getEnvironmentId(): int
    {
        return $this->environmentId;
    }

    public function getFacebookAppId() : int
    {
        return $this->facebookAppId;
    }

    public function getGoogleAnalyticsTrackingId() : string
    {
        return $this->googleAnalyticsTrackingId;
    }

    public function getGoogleTagManagerId() : string
    {
        return $this->googleTagManagerId;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getShortName(): string
    {
        return $this->shortName;
    }

    public function getWebsiteId()
    {
        return $this->websiteId;
    }

    public function setAmazonTrackingId(string $amazonTrackingId)
    {
        $this->amazonTrackingId = $amazonTrackingId;
        return $this;
    }

    public function setCountry(string $country): WebsiteEntity\Website
    {
        $this->country = $country;
        return $this;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    public function setEnvironmentId(int $environmentId): WebsiteEntity\Website
    {
        $this->environmentId = $environmentId;
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

    public function setGoogleTagManagerId(string $googleTagManagerId)
    {
        $this->googleTagManagerId = $googleTagManagerId;
        return $this;
    }

    public function setLanguage(string $language): WebsiteEntity\Website
    {
        $this->language = $language;
        return $this;
    }

    public function setMetadata(array $metadata): WebsiteEntity\Website
    {
        $this->metadata = $metadata;
        return $this;
    }

    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    public function setShortName(string $shortName)
    {
        $this->shortName = $shortName;
        return $this;
    }

    public function setWebsiteId(int $websiteId)
    {
        $this->websiteId = $websiteId;
        return $this;
    }
}
