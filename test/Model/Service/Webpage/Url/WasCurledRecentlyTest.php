<?php
namespace LeoGalleguillos\WebsiteTest\Model\Service\Webpage;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use PHPUnit\Framework\TestCase;

class WasCurledRecentlyTest extends TestCase
{
    protected function setUp()
    {
        $this->httpStatusCodeLogTableMock = $this->createMock(
            WebsiteTable\UrlHttpStatusCodeLog::class
        );
        $this->wasCurledRecentlyService = new WebsiteService\Webpage\Url\WasCurledRecently(
            $this->httpStatusCodeLogTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebsiteService\Webpage\Url\WasCurledRecently::class,
            $this->wasCurledRecentlyService
        );
    }

    public function testWasCurledRecently()
    {
        $this->httpStatusCodeLogTableMock->method('selectCountWhereUrl')->will($this->onConsecutiveCalls(0, 1, 0, 2));

        $this->assertFalse(
            $this->wasCurledRecentlyService->wasCurledRecently('https://www.yahoo.com')
        );
        $this->assertTrue(
            $this->wasCurledRecentlyService->wasCurledRecently('https://www.yahoo.com')
        );
        $this->assertFalse(
            $this->wasCurledRecentlyService->wasCurledRecently('https://www.yahoo.com')
        );
        $this->assertTrue(
            $this->wasCurledRecentlyService->wasCurledRecently('https://www.yahoo.com')
        );
    }
}
