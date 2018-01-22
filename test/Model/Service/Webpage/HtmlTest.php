<?php
namespace LeoGalleguillos\WebsiteTest\Model\Service\Webpage;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use PHPUnit\Framework\TestCase;

class HtmlTest extends TestCase
{
    protected function setUp()
    {
        $this->htmlService = new WebsiteService\Webpage\Html();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebsiteService\Webpage\Html::class,
            $this->htmlService
        );
    }

    public function testGetHtmlFromUrl()
    {
        $this->assertTrue(
            is_string($this->htmlService->getHtmlFromUrl('https://imgur.com/'))
        );
    }
}
