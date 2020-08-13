<?php
namespace LeoGalleguillos\WebsiteTest\Model\Table;

use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use LeoGalleguillos\Test\TableTestCase;
use TypeError;
use Zend\Db\Adapter\Adapter;

class WebsiteTest extends TableTestCase
{
    protected function setUp(): void
    {
        $this->websiteTable = new WebsiteTable\Website(
            $this->getAdapter()
        );

        $this->setForeignKeyChecks0();
        $this->dropTable('website');
        $this->createTable('website');
        $this->setForeignKeyChecks1();
    }

    public function testInsert()
    {
        $this->websiteTable->insert(
            'domain',
            'name',
            'description',
            'google analytics',
            1,
            'amazon tracking id'
        );
        $this->assertSame(
            1,
            $this->websiteTable->selectCount()
        );
    }

    public function testSelectWhereDomain()
    {
        try {
            $this->websiteTable->selectWhereDomain('www.example.com');
            $this->fail();
        } catch (TypeError $typeError) {
            $this->assertSame(
                'Return value of',
                substr($typeError->getMessage(), 0, 15)
            );
        }
    }
}
