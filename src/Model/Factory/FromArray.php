<?php
namespace LeoGalleguillos\Website\Model\Factory;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use TypeError;
use Zend\Db\Adapter\Adapter;

class FromArray
{
    public function buildFromArray(
        array $array
    ) : WebsiteEntity\Website {
        $websiteEntity = new WebsiteEntity\Website();

        $websiteEntity->setName($array['name']);

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

        if (isset($array['language'])) {
            $websiteEntity->setLanguage(
                $array['language']
            );
        }

        if (isset($array['website_id'])) {
            $websiteEntity->setWebsiteId(
                $array['website_id']
            );
        }

        return $websiteEntity;
    }
}
