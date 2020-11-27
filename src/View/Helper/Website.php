<?php
namespace MonthlyBasis\Website\View\Helper;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Service as WebsiteService;
use Zend\View\Helper\AbstractHelper;

class Website extends AbstractHelper
{
    public function __construct(
        WebsiteService\Website $websiteService
    ) {
        $this->websiteService = $websiteService;
    }

    public function __invoke(): WebsiteEntity\Website
    {
        return $this->websiteService->getWebsite();
    }
}
