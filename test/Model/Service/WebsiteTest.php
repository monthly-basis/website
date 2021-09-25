<?php
namespace MonthlyBasis\WebsiteTest\Model\Service;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Service as WebsiteService;
use PHPUnit\Framework\TestCase;

class WebsiteTest extends TestCase
{
    protected function setUp(): void
    {
        $this->websiteService = new WebsiteService\Website();
    }

    public function test_getWebsiteAndSetWebsite()
    {
        $websiteEntity = new WebsiteEntity\Website();
        $this->assertSame(
            $this->websiteService,
            $this->websiteService->setWebsite($websiteEntity)
        );
        $this->assertSame(
            $websiteEntity,
            $this->websiteService->getWebsite()
        );
    }
}
