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
        $this->assertObjectHasAttribute('description', $this->websiteEntity);
        $this->assertObjectHasAttribute('domain', $this->websiteEntity);
        $this->assertObjectHasAttribute('googleAnalyticsTrackingId', $this->websiteEntity);
        $this->assertObjectHasAttribute('name', $this->websiteEntity);
        $this->assertObjectHasAttribute('websiteId', $this->websiteEntity);
    }

    public function testGetAndSetMethods()
    {
        $value = 'description';
        $this->assertSame(
            $this->websiteEntity,
            $this->websiteEntity->setDescription($value)
        );
        $this->assertSame(
            $value,
            $this->websiteEntity->getDescription()
        );

        $value = 'www.example.com';
        $this->assertSame(
            $this->websiteEntity,
            $this->websiteEntity->setDomain($value)
        );
        $this->assertSame(
            $value,
            $this->websiteEntity->getDomain()
        );

        $value = 'tracking-id';
        $this->assertSame(
            $this->websiteEntity,
            $this->websiteEntity->setGoogleAnalyticsTrackingId($value)
        );
        $this->assertSame(
            $value,
            $this->websiteEntity->getGoogleAnalyticsTrackingId()
        );

        $value = 'name';
        $this->assertSame(
            $this->websiteEntity,
            $this->websiteEntity->setName($value)
        );
        $this->assertSame(
            $value,
            $this->websiteEntity->getName()
        );

        $value = 123;
        $this->assertSame(
            $this->websiteEntity,
            $this->websiteEntity->setWebsiteId($value)
        );
        $this->assertSame(
            $value,
            $this->websiteEntity->getWebsiteId()
        );
    }
}
