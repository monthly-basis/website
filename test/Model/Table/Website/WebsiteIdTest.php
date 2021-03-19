<?php
namespace MonthlyBasis\WebsiteTest\Model\Table\Website;

use MonthlyBasis\Website\Model\Table as WebsiteTable;
use MonthlyBasis\LaminasTest\TableTestCase;
use Laminas\Db\Adapter\Adapter;

class WebsiteIdTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->setForeignKeyChecks0();
        $this->dropAndCreateTable('website');
        $this->setForeignKeyChecks1();

        $this->websiteTable = new WebsiteTable\Website(
            $this->getAdapter()
        );
        $this->websiteIdTable = new WebsiteTable\Website\WebsiteId(
            $this->getAdapter(),
            $this->websiteTable
        );
    }

    public function test_selectOrderByWebsiteId_resultWithRows()
    {
        $this->websiteTable->insert(
            'domain',
            'name',
            'description'
        );
        $this->websiteTable->insert(
            'another domain',
            'another name',
            'another description'
        );
        $result = $this->websiteIdTable->selectOrderByWebsiteId();
        $array = $result->next();
        $this->assertSame(
            1,
            (int) $array['website_id']
        );
        $array = $result->next();
        $this->assertSame(
            2,
            (int) $array['website_id']
        );
        $this->assertSame(
            'another domain',
            $array['domain']
        );
    }
}
