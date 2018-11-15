<?php
class Helios_Videogallery_Helper_Data extends Mage_Core_Helper_Abstract
{
    public function checkEnableDisable(){
       return  Mage::getStoreConfig('gallerysetting/heliossetting/enabled');
    }
    public function getAllData(){
        $videoData=Mage::getSingleton('videogallery/videogallery')->getCollection();
        $allData=$videoData->getData();
        return $allData;
    }
    public function getTitle(){
        return '<u><h1 style="text-align: left">'.Mage::getStoreConfig('gallerysetting/heliossetting/videotitle').'</h1></u>';
    }
    public function getDescription(){
        return '<p style="text-align: left">'.Mage::getStoreConfig('gallerysetting/heliossetting/videodesc').'</p>';
    }
    public function getWidth(){
        return Mage::getStoreConfig('gallerysetting/heliossetting/videowidth');
    }
    public function getHeight(){
        return Mage::getStoreConfig('gallerysetting/heliossetting/videoheight');
    }
}
	 