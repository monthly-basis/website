CREATE TABLE `webpage_http_status_code_log` (
      `webpage_http_status_code_log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `webpage_id` INT(10) unsigned NOT NULL,
      `status_code` INT(3) NOT NULL,
      `timestamp` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
      PRIMARY KEY (`webpage_http_status_code_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
