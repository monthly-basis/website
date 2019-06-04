<?php
namespace LeoGalleguillos\Website\View\Helper;

use LeoGalleguillos\Website\Model\Service as WebsiteService;
use Zend\View\Helper\AbstractHelper;

class ShowAdsService extends AbstractHelper
{
    public function __construct(
        WebsiteService\ShowAds $showAdsService
    ) {
        $this->showAdsService = $showAdsService;
    }

    public function __invoke(): WebsiteService\ShowAds
    {
        return $this->showAdsService;
    }
}
