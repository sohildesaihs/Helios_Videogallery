<?php

/**
 * Class Helios_Videogallery_Block_Adminhtml_Videogallery
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Block_Adminhtml_Videogallery extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    /**
     * Helios_Videogallery_Block_Adminhtml_Videogallery constructor.
     */
    public function __construct()
    {
        $this->_controller = "adminhtml_videogallery";
        $this->_blockGroup = "videogallery";
        $this->_headerText = $this->__("Manage Youtube Videos");
        $this->_addButtonLabel = $this->__("Add New Video");
        parent::__construct();
    }
}