<?php
namespace LeoGalleguillos\Website\Model\Entity;

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

    public function getGoogleAnalyticsTrackingId()
    {
        return $this->googleAnalyticsTrackingId;
    }

    public function getName()
    {
        return $this->name;
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

    public function setWebsiteId(int $websiteId)
    {
        $this->websiteId = $websiteId;
        return $this;
    }
}
