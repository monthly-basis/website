<?php
namespace MonthlyBasis\WebsiteTest\Model\Factory;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\Model\Factory as WebsiteFactory;
use PHPUnit\Framework\TestCase;

class NewInstanceTest extends TestCase
{
    public function setUp(): void
    {
        $this->newInstanceFactory = new WebsiteFactory\NewInstance();
    }

    public function test_buildNewInstance()
    {
        $this->assertNewInstanceOf(
            WebsiteEntity\Website::class,
            $this->newInstanceFactory->buildNewInstance()
        );
    }
}
