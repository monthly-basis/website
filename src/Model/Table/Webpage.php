<?php
namespace LeoGalleguillos\Website\Model\Table;

use ArrayObject;
use Zend\Db\Adapter\Adapter;

class Webpage
{
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return int Primary key
     */
    public function insertIgnore(
        int $websiteId,
        string $url,
        string $title,
        string $html
    ) {
        $sql = '
            INSERT IGNORE
              INTO `webpage` (`website_id`, `url`, `title`, `html`)
            VALUES (?, ?, ?, ?)
                 ;
        ';
        $parameters = [
            $websiteId,
            $url,
            $title,
            $html,
        ];
        return $this->adapter
                    ->query($sql, $parameters)
                    ->getGeneratedValue();
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `webpage`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }

    /**
     * @return ArrayObject
     */
    public function selectWhereWebpageId(int $webpageId) : ArrayObject
    {
        $sql = '
            SELECT `webpage`.`webpage_id`
                 , `webpage`.`website_id`
                 , `webpage`.`title`
                 , `webpage`.`html`
              FROM `webpage`
             WHERE `webpage`.`webpage_id` = ?
                 ;
        ';
        $result = $this->adapter->query($sql, [$webpageId])->current();

        return $result;
    }
}
