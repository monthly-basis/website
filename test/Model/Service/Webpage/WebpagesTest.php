<?php
namespace LeoGalleguillos\WebsiteTest\Model\Service\Webpage;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use PHPUnit\Framework\TestCase;

class WebpagesTest extends TestCase
{
    protected function setUp()
    {
        $this->webpageFactoryMock = $this->createMock(
            WebsiteFactory\Webpage::class
        );
        $this->webpageTableMock = $this->createMock(
            WebsiteTable\Webpage::class
        );
        $this->webpagesService = new WebsiteService\Webpage\Webpages(
            $this->webpageFactoryMock,
            $this->webpageTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebsiteService\Webpage\Webpages::class,
            $this->webpagesService
        );
    }
}
