<?php
namespace LeoGalleguillos\Website\View\Helper;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Service as WebsiteService;

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
