<?php
namespace LeoGalleguillos\WebsiteTest\Model\Entity;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use PHPUnit\Framework\TestCase;

class WebpageTest extends TestCase
{
    protected function setUp()
    {
        $this->webpage = new WebsiteEntity\Webpage();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebsiteEntity\Webpage::class,
            $this->webpage
        );
    }

    public function testAttributes()
    {
        $this->assertObjectHasAttribute(
            'htmlEntity',
            $this->webpage
        );
    }
}
