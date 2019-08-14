<?php
namespace LeoGalleguillos\Website\View\Helper;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
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
