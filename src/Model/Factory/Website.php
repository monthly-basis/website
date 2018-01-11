<?php
namespace LeoGalleguillos\Website\Model\Factory;

use ArrayObject;
use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use Application\Model\Table as ApplicationTable;
use Zend\Db\Adapter\Adapter;

class Website
{
    public function __construct(
        WebsiteTable\Website $websiteTable
    ) {
        $this->websiteTable = $websiteTable;
    }

    public function buildFromArrayObject(
        ArrayObject $arrayObject
    ) : WebsiteEntity\Website {
        $websiteEntity = $this->buildInstance()
            ->setDescription($arrayObject['description'])
            ->setDomain($arrayObject['domain'])
            ->setGoogleAnalyticsTrackingId($arrayObject['google_analytics_tracking_id'])
            ->setName($arrayObject['name'])
            ->setWebsiteId($arrayObject['website_id']);

        return $websiteEntity;
    }

    public function buildFromDomain() : WebsiteEntity\Website
    {
        $arrayObject = $this->websiteTable->selectWhereDomain(
            $_SERVER['HTTP_HOST']
        );

        $websiteEntity = $this->buildInstance()
            ->setWebsiteId($arrayObject['website_website_id'])
            ->setName($arrayObject['website_website_name'])
            ->setGoogleAnalyticsTrackingId($arrayObject['website_website_google_analytics_tracking_id'])
            ->setDescription($arrayObject['website_website_description']);

        return $websiteEntity;
    }

    protected function buildInstance() : WebsiteEntity\Website
    {
        return new WebsiteEntity\Website();
    }
}
