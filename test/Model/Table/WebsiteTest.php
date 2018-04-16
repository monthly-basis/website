<?php
namespace LeoGalleguillos\WebsiteTest\Model\Table;

use ArrayObject;
use Exception;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use LeoGalleguillos\WebsiteTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class WebsiteTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/website/';

    protected function setUp()
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter         = new Adapter($configArray);
        $this->websiteTable = new WebsiteTable\Website($this->adapter);

        $this->setForeignKeyChecks0();
        $this->dropTable();
        $this->createTable();
        $this->setForeignKeyChecks1();
    }

    protected function dropTable()
    {
        $sql = file_get_contents($this->sqlPath . 'drop.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    protected function createTable()
    {
        $sql = file_get_contents($this->sqlPath . 'create.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(WebsiteTable\Website::class, $this->websiteTable);
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
        } catch (Exception $exception) {
            $this->assertSame(
                'Matching row not found.',
                $exception->getMessage()
            );
        }
    }
}
