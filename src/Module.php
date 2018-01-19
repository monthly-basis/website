<?php
namespace LeoGalleguillos\Website;

use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
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
                WebsiteTable\Website::class => function ($serviceManager) {
                    return new WebsiteTable\Website(
                        $serviceManager->get('website')
                    );
                },
            ],
        ];
    }
}