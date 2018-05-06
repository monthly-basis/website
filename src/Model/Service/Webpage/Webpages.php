<?php
namespace LeoGalleguillos\Website\Model\Service\Webpage;

use Generator;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;

class Webpages
{
    public function __construct(
        WebsiteFactory\Webpage $webpageFactory,
        WebsiteTable\Webpage $webpageTable
    ) {
        $this->webpageFactory = $webpageFactory;
        $this->webpageTable   = $webpageTable;
    }

    /**
     * Get webpages.
     *
     * @return Generator
     * @yield WebsiteEntity\Webpage
     */
    public function getWebpages() : string
    {
        foreach ($this->webpageTable->select() as $array) {
            yield $this->webpageFactory->buildFromArray($array);
        }
    }
}
