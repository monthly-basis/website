<?php
namespace MonthlyBasis\WebsiteTest\Model\Service\Website;

use Laminas\Db\Adapter\Driver\Pdo\Result;
use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;
use MonthlyBasis\Website\Model\Service as WebsiteService;
use MonthlyBasis\Website\Model\Table as WebsiteTable;
use MonthlyBasis\LaminasTest\Hydrator as LaminasTestHydrator;
use PHPUnit\Framework\TestCase;

class WebsitesTest extends TestCase
{
    protected function setUp(): void
    {
        $this->fromArrayFactoryMock = $this->createMock(
            WebsiteFactory\FromArray::class
        );
        $this->websiteIdTableMock = $this->createMock(
            WebsiteTable\Website\WebsiteId::class
        );
        $this->websitesService = new WebsiteService\Website\Websites(
            $this->fromArrayFactoryMock,
            $this->websiteIdTableMock
        );
    }

    public function test_getWebsites_websiteEntities()
    {
        $resultMock = $this->createMock(
            Result::class
        );
        (new LaminasTestHydrator\CountableIterator())->hydrate(
            $resultMock,
            [
                [],
                [],
            ]
        );
        $this->websiteIdTableMock
            ->expects($this->once())
            ->method('selectOrderByWebsiteId')
            ->willReturn(
                $resultMock
            )
            ;
        $this->fromArrayFactoryMock
            ->expects($this->exactly(2))
            ->method('buildFromArray')
            ->willReturn(
                new WebsiteEntity\Website()
            )
            ;
        $generator = $this->websitesService->getWebsites();
        $this->assertInstanceOf(
            WebsiteEntity\Website::class,
            $generator->current()
        );
        $generator->next();
        $this->assertInstanceOf(
            WebsiteEntity\Website::class,
            $generator->current()
        );
    }
}
