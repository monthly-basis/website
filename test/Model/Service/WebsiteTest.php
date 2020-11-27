<?php
namespace MonthlyBasis\WebsiteTest\Model\Service;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;
use MonthlyBasis\Website\Model\Service as WebsiteService;
use PHPUnit\Framework\TestCase;

class WebsiteTest extends TestCase
{
    protected function setUp(): void
    {
        $this->websiteFactoryMock = $this->createMock(
            WebsiteFactory\Website::class
        );
        $this->websiteService = new WebsiteService\Website(
            $this->websiteFactoryMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(WebsiteService\Website::class, $this->websiteService);
    }
}
