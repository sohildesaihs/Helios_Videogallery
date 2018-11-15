<?php

/**
 * Class Helios_Videogallery_Model_Mysql4_Videogallery
 */
class Helios_Videogallery_Model_Mysql4_Videogallery extends Mage_Core_Model_Mysql4_Abstract
{
    /**
     * Helios_Videogallery_Model_Mysql4_Videogallery constructor
     */
    protected function _construct()
    {
        $this->_init("videogallery/videogallery", "videogallery_id");
    }
}