<?php

/**
 * Class Helios_Videogallery_Helper_Data
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Helper_Data extends Mage_Core_Helper_Abstract
{
    const CONFIG_GALLERY_ENABLE = 'gallerysetting/heliossetting/enabled';
    const CONFIG_GALLERY_TITLE = 'gallerysetting/heliossetting/videotitle';
    const CONFIG_GALLERY_DESCRIPTION = 'gallerysetting/heliossetting/videodesc';
    const CONFIG_GALLERY_VIDEO_WIDTH = 'gallerysetting/heliossetting/videowidth';
    const CONFIG_GALLERY_VIDEO_HEIGHT = 'gallerysetting/heliossetting/videoheight';

    public function checkEnableDisable()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_ENABLE);
    }

    public function getTitle()
    {
        return '<u><h1 style="text-align: left">' . Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_TITLE) . '</h1></u>';
    }

    public function getDescription()
    {
        return '<p style="text-align: left">' . Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_DESCRIPTION) . '</p>';
    }

    public function getWidth()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_VIDEO_WIDTH);
    }

    public function getHeight()
    {
        return Mage::getStoreConfig(Helios_Videogallery_Helper_Data::CONFIG_GALLERY_VIDEO_HEIGHT);
    }
}