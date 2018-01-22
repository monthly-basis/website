<?php
namespace LeoGalleguillos\WebsiteTest\Model\Factory;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use PHPUnit\Framework\TestCase;

class WebpageTest extends TestCase
{
    protected function setUp()
    {
        $this->webpageTableMock = $this->createMock(
            WebsiteTable\Webpage::class
        );
        $this->webpageFactory = new WebsiteFactory\Webpage(
            $this->webpageTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebsiteFactory\Webpage::class,
            $this->webpageFactory
        );
    }
}
