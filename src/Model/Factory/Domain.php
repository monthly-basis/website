<?php
namespace MonthlyBasis\Website\Model\Factory;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;
use MonthlyBasis\Website\Model\Table as WebsiteTable;

/**
 * @deprecated Use WebsiteFactory\FromDomain() instead
 */
class Domain
{
    public function __construct(
        WebsiteFactory\FromArray $fromArrayFactory,
        WebsiteTable\Website $websiteTable
    ) {
        $this->fromArrayFactory = $fromArrayFactory;
        $this->websiteTable     = $websiteTable;
    }

    public function buildFromDomain(string $domain): WebsiteEntity\Website
    {
        return $this->fromArrayFactory->buildFromArray(
            $this->websiteTable->selectWhereDomain($domain)
        );
    }
}
