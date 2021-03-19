<?php
namespace MonthlyBasis\Website\Model\Service\Website;

use Generator;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;
use MonthlyBasis\Website\Model\Table as WebsiteTable;

class Websites
{
    public function __construct(
        WebsiteFactory\FromArray $fromArrayFactory,
        WebsiteTable\Website\WebsiteId $websiteIdTable
    ) {
        $this->fromArrayFactory = $fromArrayFactory;
        $this->websiteIdTable   = $websiteIdTable;
    }

    public function getWebsites(): Generator
    {
        foreach ($this->websiteIdTable->selectOrderByWebsiteId() as $array) {
            yield $this->fromArrayFactory->buildFromArray($array);
        }
    }
}
