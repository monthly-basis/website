<?php
namespace LeoGalleguillos\WebsiteTest\Model\Entity;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use PHPUnit\Framework\TestCase;

class WebsiteTest extends TestCase
{
    protected function setUp()
    {
        $this->websiteEntity = new WebsiteEntity\Website();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(WebsiteEntity\Website::class, $this->websiteEntity);
    }

    public function testAttributes()
    {
        $this->assertObjectHasAttribute('domain', $this->websiteEntity);
        $this->assertObjectHasAttribute('googleAnalyticsTrackingId', $this->websiteEntity);
        $this->assertObjectHasAttribute('name', $this->websiteEntity);
        $this->assertObjectHasAttribute('websiteId', $this->websiteEntity);
    }
}
