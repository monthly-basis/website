<?php
namespace MonthlyBasis\WebsiteTest\View\Helper;

use MonthlyBasis\Website\Model\Entity as WebsiteEntity;
use MonthlyBasis\Website\View\Helper as WebsiteHelper;
use PHPUnit\Framework\TestCase;

class DomainTest extends TestCase
{
    protected function setUp(): void
    {
    }

    public function test___invoke_emptyConfig_null()
    {
        $websiteConfig = new WebsiteEntity\Config();
        $domainHelper = new WebsiteHelper\Domain(
            $websiteConfig
        );
        $this->assertNull(
            $domainHelper->__invoke()
        );
    }

    public function test___invoke_nonEmptyConfig_domain()
    {
        $websiteConfig = new WebsiteEntity\Config([
            'domain' => 'www.example.com',
        ]);
        $domainHelper = new WebsiteHelper\Domain(
            $websiteConfig
        );
        $this->assertSame(
            'www.example.com',
            $domainHelper->__invoke()
        );
    }
}
