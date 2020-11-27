<?php
namespace MonthlyBasis\Website\View\Helper;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Service as WebsiteService;

class GetInstance
{
    public function __construct(
        WebsiteService\FromDomain $fromDomainService
    ) {
        $this->fromDomainService = $fromDomainService;
    }

    public function __invoke(): WebsiteEntity\Website
    {
        return $this->fromDomainService->getWebsite();
    }
}
