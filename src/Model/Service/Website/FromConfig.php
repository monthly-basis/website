<?php
namespace MonthlyBasis\Website\Model\Service\Website;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;

class FromConfig
{
    /**
     * @var array
     */
    protected $cache = [];

    public function __construct(
        array $websiteConfig,
        WebsiteFactory\Website $websiteFactory
    ) {
        $this->websiteConfig  = $websiteConfig;
        $this->websiteFactory = $websiteFactory;
    }

    public function getWebsite(): WebsiteEntity\Website
    {
        if (isset($this->cache['websiteEntity'])) {
            return $this->cache['websiteEntity'];
        }

        $this->cache['websiteEntity'] = $this->websiteFactory->buildFromArray(
            $this->websiteConfig['domains'][$_SERVER['HTTP_HOST']]
        );
        return $this->cache['websiteEntity'];
    }
}
