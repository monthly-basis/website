<?php
namespace LeoGalleguillos\WebsiteTest\Model\Service\Webpage;

use LeoGalleguillos\Html\Model\Entity as HtmlEntity;
use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use PHPUnit\Framework\TestCase;

class LinksTest extends TestCase
{
    protected function setUp()
    {
        $this->linksService = new WebsiteService\Webpage\Links();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebsiteService\Webpage\Links::class,
            $this->linksService
        );
    }

    public function testGetLinks()
    {
        $htmlEntity = new HtmlEntity\Html();

        $webpageEntity = new WebsiteEntity\Webpage();
        $webpageEntity->setHtmlEntity($htmlEntity);

        $htmlEntity->setString('wow');
        $this->assertSame(
            [],
            $this->linksService->getLinks($webpageEntity)
        );

        $htmlEntity->setString('<a href="/root/relative/path">wow</a>');
        $this->assertSame(
            [],
            $this->linksService->getLinks($webpageEntity)
        );

        $htmlEntity->setString('<a href="https://www.example.com/path">wow</a>');
        $this->assertSame(
            ['https://www.example.com/path'],
            $this->linksService->getLinks($webpageEntity)
        );
    }
}
