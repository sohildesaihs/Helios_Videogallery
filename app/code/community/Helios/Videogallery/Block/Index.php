<?php

/**
 * Class Helios_Videogallery_Block_Index
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Block_Index extends Mage_Core_Block_Template
{
    /**
     * Gets status of video gallery extension
     *
     * @return mixed
     */
    public function checkEnableDisable()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_ENABLE);
    }

    /**
     * Gets the title of video gallery from config
     *
     * @return mixed
     */
    public function getTitle()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_TITLE);
    }

    /**
     * Gets the description of video gallery from config
     *
     * @return mixed
     */
    public function getDescription()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_DESCRIPTION);
    }

    /**
     * Gets the width of playing video from config
     *
     * @return mixed
     */
    public function getWidth()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_VIDEO_WIDTH);
    }

    /**
     * Gets the height of playing video from config
     *
     * @return mixed
     */
    public function getHeight()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_VIDEO_HEIGHT);
    }

    /**
     * Gets the collection of videos to load on frontend
     *
     * @return object
     */
    public function getAllData()
    {
        $videoCollection = Mage::getSingleton('videogallery/videogallery')->getCollection();

        return $videoCollection;
    }
}