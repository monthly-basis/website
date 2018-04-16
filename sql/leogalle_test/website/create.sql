CREATE TABLE `website` (
      `website_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `domain` varchar(32) NOT NULL,
      `name` varchar(32) NOT NULL,
      `description` varchar(255) NOT NULL,
      `google_analytics_tracking_id` varchar(16) DEFAULT NULL,
      `product_group_id` int(10) unsigned NOT NULL,
      `amazon_tracking_id` varchar(32) DEFAULT NULL,
      `facebook_app_id` bigint unsigned DEFAULT NULL,
      PRIMARY KEY (`website_id`),
      UNIQUE KEY `domain` (`domain`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
