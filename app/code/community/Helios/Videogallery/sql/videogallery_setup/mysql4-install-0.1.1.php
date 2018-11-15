<?php
$installer = $this;
$installer->startSetup();
$sql=<<<SQLTEXT
create table videogallery(
`videogallery_id` int not null auto_increment,
`videogallery_url` varchar(500) NOT NULL default '',
`name` varchar(255) NOT NULL default '',
primary key(`videogallery_id`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SQLTEXT;

$installer->run($sql);
//demo 
//Mage::getModel('core/url_rewrite')->setId(null);
//demo 
$installer->endSetup();
	 