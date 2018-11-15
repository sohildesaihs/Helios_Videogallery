<?php

/**
 * Class Helios_Videogallery_Block_Index
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Block_Index extends Mage_Core_Block_Template
{
    public function checkEnableDisable()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_ENABLE);
    }

    public function getTitle()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_TITLE);
    }

    public function getDescription()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_DESCRIPTION);
    }

    public function getWidth()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_VIDEO_WIDTH);
    }

    public function getHeight()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_VIDEO_HEIGHT);
    }

    public function getAllData()
    {
        $videoCollection = Mage::getSingleton('videogallery/videogallery')->getCollection();

        return $videoCollection;
    }
}