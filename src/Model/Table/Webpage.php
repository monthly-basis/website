<?php
namespace LeoGalleguillos\Website\Model\Table;

use Generator;
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
        int $websiteId = null,
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

    /**
     * @yield array
     * @return Generator
     */
    public function select() : Generator
    {
        $sql = '
            SELECT `webpage`.`webpage_id`
                 , `webpage`.`website_id`
                 , `webpage`.`url`
                 , `webpage`.`title`
                 , `webpage`.`html`
              FROM `webpage`
                 ;
        ';
        foreach ($this->adapter->query($sql)->execute() as $array) {
            yield $array;
        }
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
     * @return array
     */
    public function selectWhereWebpageId(int $webpageId) : array
    {
        $sql = '
            SELECT `webpage`.`webpage_id`
                 , `webpage`.`website_id`
                 , `webpage`.`url`
                 , `webpage`.`title`
                 , `webpage`.`html`
              FROM `webpage`
             WHERE `webpage`.`webpage_id` = ?
                 ;
        ';
        $result = $this->adapter->query($sql)->execute([$webpageId])->current();

        return $result;
    }
}
