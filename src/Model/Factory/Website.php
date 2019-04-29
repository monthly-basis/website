<?php
namespace LeoGalleguillos\Website\Model\Factory;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use TypeError;
use Zend\Db\Adapter\Adapter;

class Website
{
    public function __construct(
        WebsiteTable\Website $websiteTable
    ) {
        $this->websiteTable = $websiteTable;
    }

    public function buildFromArray(
        array $array
    ) : WebsiteEntity\Website {
        $websiteEntity = $this->buildInstance()
            ->setName($array['name'])
            ->setWebsiteId($array['website_id']);

        try {
            $websiteEntity->setDescription($array['description']);
        } catch (TypeError $typeError) {
            // Do nothing.
        }

        try {
            $websiteEntity->setDomain($array['domain']);
        } catch (TypeError $typeError) {
            // Do nothing.
        }

        if (isset($array['environment_id'])) {
            $websiteEntity->setEnvironmentId(
                (int) $array['environment_id']
            );
        }

        if (isset($array['amazon_tracking_id'])) {
            $websiteEntity->setAmazonTrackingId(
                $array['amazon_tracking_id']
            );
        }

        if (isset($array['google_analytics_tracking_id'])) {
            $websiteEntity->setGoogleAnalyticsTrackingId(
                $array['google_analytics_tracking_id']
            );
        }

        if (isset($array['facebook_app_id'])) {
            $websiteEntity->setFacebookAppId(
                $array['facebook_app_id']
            );
        }

        return $websiteEntity;
    }

    public function buildFromDomain() : WebsiteEntity\Website
    {
        $arrayObject = $this->websiteTable->selectWhereDomain(
            $_SERVER['HTTP_HOST']
        );
        return $this->buildFromArray($arrayObject);
    }

    protected function buildInstance() : WebsiteEntity\Website
    {
        return new WebsiteEntity\Website();
    }
}
