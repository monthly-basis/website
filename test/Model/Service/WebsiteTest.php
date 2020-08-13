<?php
namespace LeoGalleguillos\WebsiteTest\Model\Service;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
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
