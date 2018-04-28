<?php
namespace LeoGalleguillos\WebsiteTest\Model\Service\Webpage;

use LeoGalleguillos\Website\Model\Entity as WebsiteEntity;
use LeoGalleguillos\Website\Model\Factory as WebsiteFactory;
use LeoGalleguillos\Website\Model\Service as WebsiteService;
use PHPUnit\Framework\TestCase;

class HttpStatusCodeTest extends TestCase
{
    protected function setUp()
    {
        $this->httpStatusCodeService = new WebsiteService\Webpage\HttpStatusCode();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebsiteService\Webpage\HttpStatusCode::class,
            $this->httpStatusCodeService
        );
    }

    public function testGetHttpStatusCode()
    {
        $webpageEntity = new WebsiteEntity\Webpage();

        $webpageEntity->setUrl('https://www.yahoo.com');
        $this->assertSame(
            200,
            $this->httpStatusCodeService->getHttpStatusCode($webpageEntity)
        );

        $webpageEntity->setUrl('https://www.yahoo.com/does-not-exist');
        $this->assertSame(
            404,
            $this->httpStatusCodeService->getHttpStatusCode($webpageEntity)
        );

        $webpageEntity->setUrl('https://www.asdasdasd.com/timeout');
        $this->assertSame(
            0,
            $this->httpStatusCodeService->getHttpStatusCode($webpageEntity)
        );

        $webpageEntity->setUrl('https://www.reddit.com');
        $this->assertSame(
            200,
            $this->httpStatusCodeService->getHttpStatusCode($webpageEntity)
        );
    }
}
