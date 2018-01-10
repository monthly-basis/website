<?php
namespace LeoGalleguillos\WebsiteTest\Model\Factory;

use ArrayObject;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use PHPUnit\Framework\TestCase;

class WebsiteTest extends TestCase
{
    protected function setUp()
    {
        $this->websiteTableMock = $this->createMock(
            WebsiteTable\Website::class
        );
        $this->websiteFactory = new WebsiteFactory\Website(
            $this->websiteTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(WebsiteFactory\Website::class, $this->websiteFactory);
    }
}
