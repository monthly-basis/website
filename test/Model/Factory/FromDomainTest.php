<?php
namespace MonthlyBasis\WebsiteTest\Model\Factory;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;
use MonthlyBasis\Website\Model\Table as WebsiteTable;
use PHPUnit\Framework\TestCase;

class FromDomainTest extends TestCase
{
    protected function setUp(): void
    {
        $this->fromArrayFactoryMock = $this->createMock(
            WebsiteFactory\FromArray::class
        );
        $this->websiteTableMock = $this->createMock(
            WebsiteTable\Website::class
        );

        $this->fromDomainFactory = new WebsiteFactory\Domain(
            $this->fromArrayFactoryMock,
            $this->websiteTableMock
        );
    }

    public function test_buildFromArray()
    {
        $this->websiteTableMock
            ->expects($this->once())
            ->method('selectWhereDomain')
            ->with('www.example.com')
            ->willReturn(
                [
                    'website_id' => '271828'
                ]
            )
            ;
        $this->fromArrayFactoryMock
            ->expects($this->once())
            ->method('buildFromArray')
            ->with(
                [
                    'website_id' => '271828'
                ]
            )
            ->willReturn(new WebsiteEntity\Website())
            ;

        $this->assertEquals(
            new WebsiteEntity\Website(),
            $this->fromDomainFactory->buildFromDomain('www.example.com')
        );
    }
}
