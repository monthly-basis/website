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
                    'getWebsiteFromConfig' => WebsiteHelper\Website\FromConfig::class,
                    'getWebsiteInstance' => WebsiteHelper\GetInstance::class,
                ],
                'factories' => [
                    WebsiteHelper\GetInstance::class => function ($serviceManager) {
                        return new WebsiteHelper\GetInstance(
                            $serviceManager->get(WebsiteService\Website::class)
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
                WebsiteFactory\Website::class => function ($serviceManager) {
                    return new WebsiteFactory\Website(
                        $serviceManager->get(WebsiteTable\Website::class)
                    );
                },
                WebsiteService\ShowAds::class => function ($serviceManager) {
                    return new WebsiteService\ShowAds();
                },
                WebsiteService\Website::class => function ($serviceManager) {
                    return new WebsiteService\Website(
                        $serviceManager->get(WebsiteFactory\Website::class)
                    );
                },
                WebsiteService\Website\FromConfig::class => function ($sm) {
                    return new WebsiteService\Website\FromConfig(
                        $sm->get('Config')['website'],
                        $sm->get(WebsiteFactory\Website::class)
                    );
                },
                WebsiteTable\Website::class => function ($serviceManager) {
                    return new WebsiteTable\Website(
                        $serviceManager->get('main')
                    );
                },
                WebsiteTable\Website\EnvironmentId::class => function ($sm) {
                    return new WebsiteTable\Website\EnvironmentId(
                        $sm->get('main'),
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
