<?php
namespace MonthlyBasis\Website\View\Helper\Website;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Service as WebsiteService;

class FromConfig
{
    public function __construct(
        WebsiteService\Website\FromConfig $fromConfigService
    ) {
        $this->fromConfigService = $fromConfigService;
    }

    public function __invoke(): WebsiteEntity\Website
    {
        return $this->fromConfigService->getWebsite();
    }
}
