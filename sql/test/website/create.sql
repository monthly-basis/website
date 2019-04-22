CREATE TABLE `website` (
      `website_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `domain` varchar(32) NOT NULL,
      `name` varchar(32) NOT NULL,
      `description` varchar(255) NOT NULL,
      `google_analytics_tracking_id` varchar(16) DEFAULT NULL,
      `amazon_tracking_id` varchar(32) DEFAULT NULL,
      `facebook_app_id` bigint unsigned DEFAULT NULL,
      PRIMARY KEY (`website_id`),
      UNIQUE KEY `domain` (`domain`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
