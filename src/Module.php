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
                    'getWebsiteInstance' => WebsiteHelper\GetInstance::class,
                ],
                'factories' => [
                    WebsiteHelper\GetInstance::class => function ($serviceManager) {
                        return new WebsiteHelper\GetInstance(
                            $serviceManager->get(WebsiteService\Website::class)
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
                WebsiteFactory\Webpage::class => function ($serviceManager) {
                    return new WebsiteFactory\Webpage(
                        $serviceManager->get(WebsiteTable\Webpage::class)
                    );
                },
                WebsiteFactory\Website::class => function ($serviceManager) {
                    return new WebsiteFactory\Website(
                        $serviceManager->get(WebsiteTable\Website::class)
                    );
                },
                WebsiteService\Webpage\Html::class => function ($serviceManager) {
                    return new WebsiteService\Webpage\Html(
                    );
                },
                WebsiteService\Webpage\Slug::class => function ($serviceManager) {
                    return new WebsiteService\Webpage\Slug(
                        $serviceManager->get(StringService\UrlFriendly::class)
                    );
                },
                WebsiteService\Website::class => function ($serviceManager) {
                    return new WebsiteService\Website(
                        $serviceManager->get(WebsiteFactory\Website::class)
                    );
                },
                WebsiteTable\Website::class => function ($serviceManager) {
                    return new WebsiteTable\Website(
                        $serviceManager->get('main')
                    );
                },
                WebsiteTable\Webpage::class => function ($serviceManager) {
                    return new WebsiteTable\Webpage(
                        $serviceManager->get('website')
                    );
                },
            ],
        ];
    }
}
