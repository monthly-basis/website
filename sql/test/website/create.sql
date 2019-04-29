CREATE TABLE `website` (
      `website_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `domain` varchar(255) NOT NULL,
      `name` varchar(255) NOT NULL,
      `description` varchar(255) NOT NULL,
      `environment_id` tinyint(1) DEFAULT NULL,
      `google_analytics_tracking_id` varchar(16) DEFAULT NULL,
      `amazon_tracking_id` varchar(255) DEFAULT NULL,
      `facebook_app_id` bigint unsigned DEFAULT NULL,
      PRIMARY KEY (`website_id`),
      UNIQUE KEY `domain` (`domain`),
      INDEX `environment_id` (`environment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
