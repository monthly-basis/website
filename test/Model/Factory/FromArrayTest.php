<?php
namespace MonthlyBasis\WebsiteTest\Model\Factory;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;
use PHPUnit\Framework\TestCase;

class FromArrayTest extends TestCase
{
    protected function setUp(): void
    {
        $this->fromArrayFactory = new WebsiteFactory\FromArray();
    }

    public function test_buildFromArray()
    {
        $array = [
            'description'                  => 'My example website',
            'domain'                       => 'www.example.com',
            'google_analytics_tracking_id' => 'example-tracking-id',
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
