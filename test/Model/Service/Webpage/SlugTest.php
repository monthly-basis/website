<?php
namespace LeoGalleguillos\WebsiteTest\Model\Service\Webpage;

use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use PHPUnit\Framework\TestCase;

class SlugTest extends TestCase
{
    protected function setUp()
    {
        $this->slugService = new WebsiteService\Webpage\Slug(
            new StringService\UrlFriendly()
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebsiteService\Webpage\Slug::class,
            $this->slugService
        );
    }

    public function testGetHtmlFromUrl()
    {
        $webpageEntity = new WebsiteEntity\Webpage();
        $webpageEntity->setTitle('This is the title.');
        $this->assertSame(
            'This-is-the-title',
            $this->slugService->getSlug($webpageEntity)
        );
    }
}
