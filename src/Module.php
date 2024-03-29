<?php
namespace MonthlyBasis\Website;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;
use MonthlyBasis\Website\Model\Service as WebsiteService;
use MonthlyBasis\Website\Model\Table as WebsiteTable;
use MonthlyBasis\Website\View\Helper as WebsiteHelper;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'getShowAdsService'    => WebsiteHelper\ShowAdsService::class,
                    'getWebsite'           => WebsiteHelper\Website::class,
                    'getWebsiteFromConfig' => WebsiteHelper\Website\FromConfig::class,
                    'getWebsiteDomain'     => WebsiteHelper\Domain::class,
                    'getWebsiteInstance'   => WebsiteHelper\GetInstance::class,
                    'getWebsiteLanguage'   => WebsiteHelper\Website\Language::class,
                ],
                'factories' => [
                    WebsiteHelper\Domain::class => function ($sm) {
                        return new WebsiteHelper\Domain(
                            $sm->get(WebsiteEntity\Config::class)
                        );
                    },
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
                    WebsiteHelper\Website::class => function ($sm) {
                        return new WebsiteHelper\Website(
                            $sm->get(WebsiteService\Website::class)
                        );
                    },
                    WebsiteHelper\Website\FromConfig::class => function ($sm) {
                        return new WebsiteHelper\Website\FromConfig(
                            $sm->get(WebsiteService\Website\FromConfig::class)
                        );
                    },
                    WebsiteHelper\Website\Language::class => function ($sm) {
                        return new WebsiteHelper\Website\Language(
                            $sm->get(WebsiteService\Website::class)
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
                WebsiteEntity\Config::class => function ($sm) {
                    return new WebsiteEntity\Config(
                        $sm->get('Config')['monthly-basis']['website'] ?? []
                    );
                },
                WebsiteFactory\Domain::class => function ($sm) {
                    return new WebsiteFactory\Domain(
                        $sm->get(WebsiteFactory\FromArray::class),
                        $sm->get(WebsiteTable\Website::class)
                    );
                },
                WebsiteFactory\FromArray::class => function ($sm) {
                    return new WebsiteFactory\FromArray(
                        $sm->get(WebsiteFactory\NewInstance::class)
                    );
                },
                WebsiteFactory\FromDomain::class => function ($sm) {
                    return new WebsiteFactory\FromDomain(
                        $sm->get(WebsiteFactory\FromArray::class),
                        $sm->get(WebsiteTable\Website::class)
                    );
                },
                WebsiteFactory\NewInstance::class => function ($sm) {
                    return new WebsiteFactory\NewInstance();
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
                WebsiteService\Website\Websites::class => function ($sm) {
                    return new WebsiteService\Website\Websites(
                        $sm->get(WebsiteFactory\FromArray::class),
                        $sm->get(WebsiteTable\Website\WebsiteId::class)
                    );
                },
                WebsiteService\Website\FromConfig::class => function ($sm) {
                    return new WebsiteService\Website\FromConfig(
                        $sm->get('Config')['website'],
                        $sm->get(WebsiteFactory\FromArray::class)
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
                WebsiteTable\Website\WebsiteId::class => function ($sm) {
                    return new WebsiteTable\Website\WebsiteId(
                        $sm->get('website'),
                        $sm->get(WebsiteTable\Website::class)
                    );
                },
            ],
        ];
    }

    public function onBootstrap()
    {
        require_once(__DIR__ . '/GlobalFunction/var_dump_pre.php');
    }
}
