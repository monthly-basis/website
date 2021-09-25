<?php
namespace MonthlyBasis\Website\Model\Service\Website;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;

class FromConfig
{
    protected array $cache = [];

    public function __construct(
        array $websiteConfig,
        WebsiteFactory\FromArray $fromArrayFactory
    ) {
        $this->websiteConfig    = $websiteConfig;
        $this->fromArrayFactory = $fromArrayFactory;
    }

    public function getWebsite(): WebsiteEntity\Website
    {
        if (isset($this->cache['websiteEntity'])) {
            return $this->cache['websiteEntity'];
        }

        $this->cache['websiteEntity'] = $this->fromArrayFactory->buildFromArray(
            $this->websiteConfig['domains'][$_SERVER['HTTP_HOST']]
        );
        return $this->cache['websiteEntity'];
    }
}
