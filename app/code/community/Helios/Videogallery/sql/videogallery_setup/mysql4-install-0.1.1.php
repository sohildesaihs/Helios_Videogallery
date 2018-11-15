<?php
$installer = $this;
$installer->startSetup();
$sql = <<<SQLTEXT
    DROP TABLE IF EXISTS `videogallery`;
    CREATE TABLE `videogallery`(
    `videogallery_id` int NOT NULL auto_increment,
    `videogallery_url` varchar(500) NOT NULL default '',
    `name` varchar(255) NOT NULL default '',
    PRIMARY KEY(`videogallery_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQLTEXT;

$installer->run($sql);
$installer->endSetup();
	 