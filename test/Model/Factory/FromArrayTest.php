<?php
namespace MonthlyBasis\WebsiteTest\Model\Factory;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;
use PHPUnit\Framework\TestCase;

class FromArrayTest extends TestCase
{
    protected function setUp(): void
    {
        $this->newInstanceFactoryMock = $this->createMock(
            WebsiteFactory\NewInstance::class
        );
        $this->fromArrayFactory = new WebsiteFactory\FromArray(
            $this->newInstanceFactoryMock
        );
    }

    public function test_buildFromArray()
    {
        $this->newInstanceFactoryMock
            ->expects($this->once())
            ->method('buildNewInstance')
            ->willReturn(new WebsiteEntity\Website())
            ;

        $array = [
            'description'                  => 'My example website',
            'domain'                       => 'www.example.com',
            'google_analytics_tracking_id' => 'example-tracking-id',
            'google_tag_manager_id'        => 'google-tag-manager-id',
            'metadata' => [
                'foo' => 'bar',
            ],
            'name'                         => 'Example Name',
            'website_id'                   => '12345',
            'amazon_tracking_id'           => 'amazon-20',
            'facebook_app_id'              => '12345',
        ];
        $websiteEntity = new WebsiteEntity\Website();
        $websiteEntity
            ->setDescription('My example website')
            ->setDomain('www.example.com')
            ->setGoogleAnalyticsTrackingId('example-tracking-id')
            ->setGoogleTagManagerId('google-tag-manager-id')
            ->setMetadata(['foo' => 'bar'])
            ->setName('Example Name')
            ->setWebsiteId('12345')
            ->setAmazonTrackingId('amazon-20')
            ->setFacebookAppId('12345')
            ;

        $this->assertEquals(
            $websiteEntity,
            $this->fromArrayFactory->buildFromArray($array)
        );
    }
}
