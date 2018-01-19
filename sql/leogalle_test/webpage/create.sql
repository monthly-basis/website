CREATE TABLE `webpage` (
      `webpage_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `website_id` int(10) unsigned NOT NULL,
      `title` varchar(255) NOT NULL,
      `html` text NOT NULL,
      PRIMARY KEY (`webpage_id`),
      KEY `website_id` (`website_id`),
      CONSTRAINT `website_id` FOREIGN KEY (`website_id`) REFERENCES `website` (`website_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
