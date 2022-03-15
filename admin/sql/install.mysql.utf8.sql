

DROP TABLE IF EXISTS `#__doliconnect_log`;

CREATE TABLE `#__doliconnect_log` (
	`id`       INT(11)     NOT NULL AUTO_INCREMENT,
	`log` TEXT NOT NULL,
    `created_at` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=MyISAM
AUTO_INCREMENT=0
DEFAULT CHARSET=utf8;

