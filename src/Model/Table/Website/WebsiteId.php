<?php
namespace MonthlyBasis\Website\Model\Table\Website;

use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\Driver\Pdo\Result;
use MonthlyBasis\Website\Model\Table as WebsiteTable;

class WebsiteId
{
    public function __construct(
        Adapter $adapter,
        WebsiteTable\Website $websiteTable
    ) {
        $this->adapter      = $adapter;
        $this->websiteTable = $websiteTable;
    }

    public function selectOrderByWebsiteId(): Result
    {
        $sql = $this->websiteTable->getSelect()
             . '
              FROM `website`
             ORDER
                BY `website`.`website_id` ASC
                 ;
        ';
        return $this->adapter->query($sql)->execute();
    }
}
