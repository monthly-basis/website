<?php
namespace LeoGalleguillos\Website\Model\Table;

use ArrayObject;
use Zend\Db\Adapter\Adapter;

class Website
{
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return int Primary key
     */
    public function insert(
        string $domain,
        string $name,
        string $googleAnalyticsTrackingId = null
    ) {
        $sql = '
            INSERT
              INTO `website` (`domain`, `name`, `google_analytics_tracking_id`)
            VALUES (?, ?, ?)
                 ;
        ';
        $parameters = [
            $domain,
            $name,
            $googleAnalyticsTrackingId,
        ];
        return $this->adapter
                    ->query($sql, $parameters)
                    ->getGeneratedValue();
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `website`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }

    /**
     * @return ArrayObject
     */
    public function selectWhereWebsiteId(int $websiteId) : ArrayObject
    {
        $sql = '
            SELECT `website`.`website_id`
                 , `website`.`title`
                 , `website`.`body`
                 , `website`.`thumbnail_root_relative_path`
              FROM `website`
             WHERE `website`.`website_id` = ?
                 ;
        ';
        $result = $this->adapter->query($sql, [$websiteId])->current();

        return $result;
    }
}
