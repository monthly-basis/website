<?php
namespace LeoGalleguillos\Website\Model\Table;

use ArrayObject;
use Exception;
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
        string $description,
        string $googleAnalyticsTrackingId = null,
        int $productGroupId,
        string $amazonTrackingId = null
    ) {
        $sql = '
            INSERT
              INTO `website` (`domain`, `name`, `description`, `google_analytics_tracking_id`, `product_group_id`, `amazon_tracking_id`)
            VALUES (?, ?, ?, ?, ?, ?)
                 ;
        ';
        $parameters = [
            $domain,
            $name,
            $description,
            $googleAnalyticsTrackingId,
            $productGroupId,
            $amazonTrackingId,
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
                 , `website`.`domain`
                 , `website`.`name`
                 , `website`.`description`
                 , `website`.`google_analytics_tracking_id`
                 , `website`.`product_group_id`
                 , `website`.`amazon_tracking_id`
                 , `website`.`facebook_app_id`
              FROM `website`
             WHERE `website`.`website_id` = ?
                 ;
        ';
        $result = $this->adapter->query($sql, [$websiteId])->current();

        return $result;
    }

    /**
     * @return array
     */
    public function selectWhereDomain(string $domain) : array
    {
        $sql = '
            SELECT `website`.`website_id`
                 , `website`.`domain`
                 , `website`.`name`
                 , `website`.`description`
                 , `website`.`google_analytics_tracking_id`
                 , `website`.`product_group_id`
                 , `website`.`amazon_tracking_id`
                 , `website`.`facebook_app_id`
              FROM `website`
             WHERE `website`.`domain` = ?
                 ;
        ';
        $result = $this->adapter->query($sql)->execute([$domain])->current();

        if (empty($result)) {
            throw new Exception('Matching row not found.');
        }

        return $result;
    }
}
