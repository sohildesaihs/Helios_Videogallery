<?php

/**
 * Class Helios_Videogallery_Model_Mysql4_Videogallery_Collection
 */
class Helios_Videogallery_Model_Mysql4_Videogallery_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    /**
     * Helios_Videogallery_Model_Mysql4_Videogallery_Collection constructor
     */
    public function _construct()
    {
        $this->_init("videogallery/videogallery");
    }
}