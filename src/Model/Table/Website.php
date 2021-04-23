<?php
namespace MonthlyBasis\Website\Model\Table;

use Laminas\Db\Adapter\Adapter;

class Website
{
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function getSelect(): string
    {
        return '
            SELECT `website`.`website_id`
                 , `website`.`domain`
                 , `website`.`name`
                 , `website`.`description`
                 , `website`.`environment_id`
                 , `website`.`google_analytics_tracking_id`
                 , `website`.`google_tag_manager_id`
                 , `website`.`amazon_tracking_id`
                 , `website`.`facebook_app_id`
        ';
    }

    public function insert(
        string $domain,
        string $name,
        string $description,
        string $googleAnalyticsTrackingId = null,
        string $amazonTrackingId = null
    ): int {
        $sql = '
            INSERT
              INTO `website` (
                       `domain`
                     , `name`
                     , `description`
                     , `google_analytics_tracking_id`
                     , `amazon_tracking_id`
                   )
            VALUES (?, ?, ?, ?, ?)
                 ;
        ';
        $parameters = [
            $domain,
            $name,
            $description,
            $googleAnalyticsTrackingId,
            $amazonTrackingId,
        ];
        return $this->adapter
            ->query($sql)
            ->execute($parameters)
            ->getGeneratedValue();
    }

    public function selectCount(): int
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `website`
                 ;
        ';
        return (int) $this->adapter
            ->query($sql)
            ->execute()
            ->current()['count'];
    }

    /**
     * @throws TypeError
     */
    public function selectWhereWebsiteId(int $websiteId): array
    {
        $sql = '
            SELECT `website`.`website_id`
                 , `website`.`domain`
                 , `website`.`name`
                 , `website`.`description`
                 , `website`.`google_analytics_tracking_id`
                 , `website`.`amazon_tracking_id`
                 , `website`.`facebook_app_id`
              FROM `website`
             WHERE `website`.`website_id` = ?
                 ;
        ';
        $parameters = [
            $domain,
        ];
        return $this->adapter->query($sql)->execute($parameters)->current();
    }

    /**
     * @throws TypeError
     */
    public function selectWhereDomain(string $domain): array
    {
        $sql = '
            SELECT `website`.`website_id`
                 , `website`.`domain`
                 , `website`.`name`
                 , `website`.`description`
                 , `website`.`google_analytics_tracking_id`
                 , `website`.`amazon_tracking_id`
                 , `website`.`facebook_app_id`
              FROM `website`
             WHERE `website`.`domain` = ?
                 ;
        ';
        $parameters = [
            $domain,
        ];
        return $this->adapter->query($sql)->execute($parameters)->current();
    }
}
