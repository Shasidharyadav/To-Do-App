CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT '0',
  KEY `id` (`id`)
) AUTO_INCREMENT=4;

DELETE FROM `todos`;

INSERT INTO `todos` (`id`, `title`, `status`) VALUES
	(1, 'Wake Up and Walk', 0),
	(2, 'Eat Breakfast', 0),
	(3, 'Do coding easily', 0),
	(4, 'Sleep', 1);