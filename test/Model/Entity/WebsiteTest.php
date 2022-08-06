<?php
namespace MonthlyBasis\WebsiteTest\Model\Entity;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use PHPUnit\Framework\TestCase;

class WebsiteTest extends TestCase
{
    protected function setUp(): void
    {
        $this->websiteEntity = new WebsiteEntity\Website();
    }

    public function test_getAndSetMethods()
    {
        $country = 'zaf';
        $this->assertSame(
            $this->websiteEntity,
            $this->websiteEntity->setCountry($country)
        );
        $this->assertSame(
            $country,
            $this->websiteEntity->getCountry()
        );

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

        $googleTagManagerId = 'google-tag-manager-id';
        $this->assertSame(
            $this->websiteEntity,
            $this->websiteEntity->setGoogleTagManagerId($googleTagManagerId)
        );
        $this->assertSame(
            $googleTagManagerId,
            $this->websiteEntity->getGoogleTagManagerId()
        );

        $language = 'es';
        $this->assertSame(
            $this->websiteEntity,
            $this->websiteEntity->setLanguage($language)
        );
        $this->assertSame(
            $language,
            $this->websiteEntity->getLanguage()
        );

        $metadata = [
            'database' => 'custom_database_name',
        ];
        $this->assertSame(
            $this->websiteEntity,
            $this->websiteEntity->setMetadata($metadata)
        );
        $this->assertSame(
            $metadata,
            $this->websiteEntity->getMetadata()
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

        $shortName = 'short name';
        $this->assertSame(
            $this->websiteEntity,
            $this->websiteEntity->setShortName($shortName)
        );
        $this->assertSame(
            $shortName,
            $this->websiteEntity->getShortName()
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
