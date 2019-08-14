<?php
namespace LeoGalleguillos\Website\View\Helper\Website;

use LeoGalleguillos\Website\Model\Service as WebsiteService;
use Zend\View\Helper\AbstractHelper;

class Language extends AbstractHelper
{
    public function __construct(
        WebsiteService\Website $websiteService
    ) {
        $this->websiteService = $websiteService;
    }

    public function __invoke(): string
    {
        return $this->websiteService->getWebsite()->getLanguage();
    }
}
