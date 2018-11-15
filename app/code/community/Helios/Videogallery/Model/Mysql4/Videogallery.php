<?php
class Helios_Videogallery_Model_Mysql4_Videogallery extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init("videogallery/videogallery", "videogallery_id");
    }
}