<?php
namespace MonthlyBasis\Website\Model\Table\Website;

use Generator;
use MonthlyBasis\Website\Model\Table as WebsiteTable;
use Zend\Db\Adapter\Adapter;

class EnvironmentId
{
    public function __construct(
        Adapter $adapter,
        WebsiteTable\Website $websiteTable
    ) {
        $this->adapter      = $adapter;
        $this->websiteTable = $websiteTable;
    }

    public function selectWhereEnvironmentId(int $environmentId): Generator
    {
        $sql = $this->websiteTable->getSelect()
             . '
              FROM `website`
             WHERE `website`.`environment_id` = ?
                 ;
        ';
        $parameters = [
            $environmentId,
        ];
        foreach ($this->adapter->query($sql)->execute($parameters) as $array) {
            yield $array;
        }
    }
}
