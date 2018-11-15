<?php

/**
 * Class Helios_Videogallery_Block_Adminhtml_Videogallery_Edit
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Block_Adminhtml_Videogallery_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    /**
     * Helios_Videogallery_Block_Adminhtml_Videogallery_Edit constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = "videogallery_id";
        $this->_blockGroup = "videogallery";
        $this->_controller = "adminhtml_videogallery";
        $this->_updateButton("save", "label", $this->__("Save Video"));
        $this->_updateButton("delete", "label", $this->__("Delete Video"));

        $this->_addButton("saveandcontinue", array(
            "label" => $this->__("Save And Continue Edit"),
            "onclick" => "saveAndContinueEdit()",
            "class" => "save",
        ), -100);


        $this->_formScripts[] = "

							function saveAndContinueEdit(){
								editForm.submit($('edit_form').action+'back/edit/');
							}
						";
    }

    /**
     * Prepare header text for add/edit case
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry("videogallery_data") && Mage::registry("videogallery_data")->getId()) {
            return $this->__("Edit Video '%s'", $this->escapeHtml(Mage::registry("videogallery_data")->getId()));
        }

        return $this->__("Add Video");
    }
}