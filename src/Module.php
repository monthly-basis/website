<?php
namespace LeoGalleguillos\Website;

use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use LeoGalleguillos\Website\View\Helper as WebsiteHelper;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'getShowAdsService' => WebsiteHelper\ShowAdsService::class,
                    'getWebsiteFromConfig' => WebsiteHelper\Website\FromConfig::class,
                    'getWebsiteInstance' => WebsiteHelper\GetInstance::class,
                ],
                'factories' => [
                    WebsiteHelper\GetInstance::class => function ($sm) {
                        return new WebsiteHelper\GetInstance(
                            $sm->get(WebsiteService\FromDomain::class)
                        );
                    },
                    WebsiteHelper\ShowAdsService::class => function ($sm) {
                        return new WebsiteHelper\ShowAdsService(
                            $sm->get(WebsiteService\ShowAds::class)
                        );
                    },
                    WebsiteHelper\Website\FromConfig::class => function ($sm) {
                        return new WebsiteHelper\Website\FromConfig(
                            $sm->get(WebsiteService\Website\FromConfig::class)
                        );
                    },
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                WebsiteFactory\FromArray::class => function ($sm) {
                    return new WebsiteFactory\FromArray();
                },
                WebsiteFactory\Website::class => function ($sm) {
                    return new WebsiteFactory\Website(
                        $sm->get(WebsiteTable\Website::class)
                    );
                },
                WebsiteService\FromDomain::class => function ($sm) {
                    return new WebsiteService\FromDomain(
                        $sm->get(WebsiteFactory\Website::class)
                    );
                },
                WebsiteService\ShowAds::class => function ($sm) {
                    return new WebsiteService\ShowAds();
                },
                WebsiteService\Website::class => function ($sm) {
                    return new WebsiteService\Website();
                },
                WebsiteService\Website\FromConfig::class => function ($sm) {
                    return new WebsiteService\Website\FromConfig(
                        $sm->get('Config')['website'],
                        $sm->get(WebsiteFactory\Website::class)
                    );
                },
                WebsiteTable\Website::class => function ($sm) {
                    return new WebsiteTable\Website(
                        $sm->get('website')
                    );
                },
                WebsiteTable\Website\EnvironmentId::class => function ($sm) {
                    return new WebsiteTable\Website\EnvironmentId(
                        $sm->get('website'),
                        $sm->get(WebsiteTable\Website::class)
                    );
                },
            ],
        ];
    }

    public function onBootstrap()
    {
        include_once(__DIR__ . '/global-functions.php');
    }
}
