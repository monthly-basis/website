CREATE TABLE `website` (
      `website_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `domain` varchar(32) NOT NULL,
      `name` varchar(32) NOT NULL,
      `google_analytics_tracking_id` varchar(16) DEFAULT NULL,
      PRIMARY KEY (`website_id`),
      UNIQUE KEY `domain` (`domain`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
