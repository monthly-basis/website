<?php
namespace MonthlyBasis\Website\Model\Factory;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;

class FromArray
{
    public function __construct(
        WebsiteFactory\NewInstance $newInstanceFactory
    ) {
        $this->newInstanceFactory = $newInstanceFactory;
    }

    public function buildFromArray(
        array $array
    ): WebsiteEntity\Website {
        $websiteEntity = $this->newInstanceFactory->buildNewInstance();

        if (isset($array['amazon_tracking_id'])) {
            $websiteEntity->setAmazonTrackingId(
                $array['amazon_tracking_id']
            );
        }

        if (isset($array['country'])) {
            $websiteEntity->setCountry($array['country']);
        }

        if (isset($array['description'])) {
            $websiteEntity->setDescription($array['description']);
        }

        if (isset($array['domain'])) {
            $websiteEntity->setDomain($array['domain']);
        }

        if (isset($array['environment_id'])) {
            $websiteEntity->setEnvironmentId(
                (int) $array['environment_id']
            );
        }

        if (isset($array['facebook_app_id'])) {
            $websiteEntity->setFacebookAppId(
                $array['facebook_app_id']
            );
        }

        if (isset($array['google_analytics_tracking_id'])) {
            $websiteEntity->setGoogleAnalyticsTrackingId(
                $array['google_analytics_tracking_id']
            );
        }

        if (isset($array['google_tag_manager_id'])) {
            $websiteEntity->setGoogleTagManagerId(
                $array['google_tag_manager_id']
            );
        }

        if (isset($array['language'])) {
            $websiteEntity->setLanguage(
                $array['language']
            );
        }

        if (isset($array['metadata'])) {
            $websiteEntity->setMetadata(
                $array['metadata']
            );
        }

        if (isset($array['name'])) {
            $websiteEntity->setName($array['name']);
        }

        if (isset($array['short_name'])) {
            $websiteEntity->setShortName($array['short_name']);
        }

        if (isset($array['website_id'])) {
            $websiteEntity->setWebsiteId(
                $array['website_id']
            );
        }

        return $websiteEntity;
    }
}
