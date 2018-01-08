<?php
namespace LeoGalleguillos\Website;

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
                WebsiteTable\Website::class => function ($serviceManager) {
                    return new WebsiteTable\Website(
                        $serviceManager->get('website')
                    );
                },
            ],
        ];
    }
}
