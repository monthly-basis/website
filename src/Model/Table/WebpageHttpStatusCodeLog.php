<?php
namespace LeoGalleguillos\Website\Model\Table;

use Zend\Db\Adapter\Adapter;

class WebpageHttpStatusCodeLog
{
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return int Primary key
     */
    public function insert(
        int $webpageId,
        int $statusCode
    ) {
        $sql = '
            INSERT
              INTO `webpage_http_status_code_log`
                   (`webpage_id`, `http_status_code`)
            VALUES (?, ?)
                 ;
        ';
        $parameters = [
            $webpageId,
            $statusCode,
        ];
        return $this->adapter
                    ->query($sql)
                    ->execute($parameters)
                    ->getGeneratedValue();
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `webpage_http_status_code_log`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }
}
