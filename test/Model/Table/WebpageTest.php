<?php
namespace LeoGalleguillos\WebsiteTest\Model\Table;

use ArrayObject;
use LeoGalleguillos\Website\Model\Table as WebsiteTable;
use LeoGalleguillos\WebsiteTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class WebpageTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/webpage/';

    protected function setUp()
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter         = new Adapter($configArray);
        $this->websiteTable  = new WebsiteTable\Website($this->adapter);
        $this->webpageTable = new WebsiteTable\Webpage($this->adapter);

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
        $this->assertInstanceOf(WebsiteTable\Webpage::class, $this->webpageTable);
    }

    public function testInsert()
    {
        $this->webpageTable->insertIgnore(
            1,
            'https://www.sotosummarize.com/pages/1',
            'This is the title.',
            '<html><body>this is the html</body></html>'
        );
        $this->assertSame(
            0,
            $this->webpageTable->selectCount()
        );
    }

    public function testSelectWhereWebpageId()
    {
        $this->websiteTable->insert(
            'www.cnn.com',
            'CNN',
            'ana',
            1,
            'st',
            'ati'
        );
        $this->webpageTable->insertIgnore(
            1,
            'url',
            'title',
            'html'
        );
        $arrayObject = new ArrayObject([
            'webpage_id' => '1',
            'website_id' => '1',
            'url' => 'url',
            'title' => 'title',
            'html' => 'html',
        ]);
        $this->assertEquals(
            $arrayObject,
            $this->webpageTable->selectWhereWebpageId(1)
        );
    }
}
