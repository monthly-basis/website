<?php
namespace LeoGalleguillos\WebsiteTest\Model\Table;

use ArrayObject;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use LeoGalleguillos\WebsiteTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class UrlHttpStatusCodeLogTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/url_http_status_code_log/';

    protected function setUp()
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter         = new Adapter($configArray);
        $this->urlHttpStatusCodeLogTable  = new WebsiteTable\UrlHttpStatusCodeLog(
            $this->adapter
        );

        $this->dropTable();
        $this->createTable();
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
        $this->assertInstanceOf(
            WebsiteTable\UrlHttpStatusCodeLog::class,
            $this->urlHttpStatusCodeLogTable
        );
    }

    public function testInsertAndSelectCount()
    {
        $this->assertSame(
            0,
            $this->urlHttpStatusCodeLogTable->selectCount()
        );

        $this->urlHttpStatusCodeLogTable->insert(
            'https://www.yahoo.com/does-not-exist',
            404
        );

        $this->assertSame(
            1,
            $this->urlHttpStatusCodeLogTable->selectCount()
        );
    }
}
