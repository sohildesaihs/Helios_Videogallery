<?php

/**
 * Class Helios_Videogallery_Block_Adminhtml_Videogallery_Edit_Tabs
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Block_Adminhtml_Videogallery_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    /**
     * Helios_Videogallery_Block_Adminhtml_Videogallery_Edit_Tabs constructor.
     * @throws Varien_Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId("videogallery_tabs");
        $this->setDestElementId("edit_form");
        $this->setTitle($this->__("Video Gallery Section"));
    }

    /**
     * @return Mage_Core_Block_Abstract
     * @throws Exception
     */
    protected function _beforeToHtml()
    {
        $this->addTab("form_section", array(
            "label" => $this->__("Video Gallery"),
            "title" => $this->__("Video Gallery"),
            "content" => $this->getLayout()->createBlock("videogallery/adminhtml_videogallery_edit_tab_form")->toHtml(),
        ));

        return parent::_beforeToHtml();
    }

}
