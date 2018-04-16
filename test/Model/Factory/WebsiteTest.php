<?php
namespace LeoGalleguillos\WebsiteTest\Model\Factory;

use ArrayObject;
use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class WebsiteTest extends TestCase
{
    protected function setUp()
    {
        $this->websiteTableMock = $this->createMock(
            WebsiteTable\Website::class
        );
        $this->websiteFactory = new WebsiteFactory\Website(
            $this->websiteTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(WebsiteFactory\Website::class, $this->websiteFactory);
    }

    public function testBuildFromArrayObject()
    {
        $arrayObject = [
            'description'                  => 'My example website',
            'domain'                       => 'www.example.com',
            'google_analytics_tracking_id' => 'example-tracking-id',
            'name'                         => 'Example Name',
            'website_id'                   => '12345',
            'facebook_app_id'              => '12345',
        ];
        $websiteEntity = new WebsiteEntity\Website();
        $websiteEntity->setDescription('My example website')
                      ->setDomain('www.example.com')
                      ->setGoogleAnalyticsTrackingId('example-tracking-id')
                      ->setName('Example Name')
                      ->setWebsiteId('12345')
                      ->setFacebookAppId('12345');

        $this->assertEquals(
            $websiteEntity,
            $this->websiteFactory->buildFromArray($arrayObject)
        );
    }

    public function testBuildInstance()
    {
		$reflectionClass  = new ReflectionClass($this->websiteFactory);
		$reflectionMethod = $reflectionClass->getMethod('buildInstance');
		$reflectionMethod->setAccessible(true);

        $this->assertEquals(
            new WebsiteEntity\Website(),
            $reflectionMethod->invokeArgs($this->websiteFactory, [])
        );
    }
}
