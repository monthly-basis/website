<?php
namespace LeoGalleguillos\WebsiteTest\Model\Factory;

use ArrayObject;
use LeoGalleguillos\Html\Model\Entity as HtmlEntity;
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

    public function testbuildFromArray()
    {
        $arrayObject = [
            'webpage_id' => '1',
            'website_id' => '1',
            'url' => 'url',
            'title' => 'title',
            'html' => 'html',
        ];

        $htmlEntity = new HtmlEntity\Html();
        $htmlEntity->setString($arrayObject['html']);

        $webpageEntity = new WebsiteEntity\Webpage();
        $webpageEntity->setHtml($htmlEntity)
                      ->setTitle($arrayObject['title'])
                      ->setUrl($arrayObject['url'])
                      ->setWebpageId($arrayObject['webpage_id']);
        $this->assertEquals(
            $webpageEntity,
            $this->webpageFactory->buildFromArray($arrayObject)
        );
    }
}
