<?php

/**
 * Class Helios_Videogallery_Block_Adminhtml_Videogallery_Edit_Tab_Form
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Block_Adminhtml_Videogallery_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * @return Mage_Adminhtml_Block_Widget_Form
     * @throws Varien_Exception
     */
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset("videogallery_form", array(
            "legend" => $this->__("Video Gallery Information")
        ));
        $fieldset->addField("name", "label", array(
            "label" => $this->__("Video Name"),
            "class" => "required-entry",
            "required" => false,
            "name" => "videogallery_url",
        ));
        $fieldset->addField("videogallery_url", "text", array(
            "label" => $this->__("Enter Youtube URL"),
            "class" => "required-entry",
            "required" => true,
            "name" => "videogallery_url",
        ));

        if (Mage::getSingleton("adminhtml/session")->getVideogalleryData()) {
            $form->setValues(Mage::getSingleton("adminhtml/session")->getVideogalleryData());
            Mage::getSingleton("adminhtml/session")->setVideogalleryData(null);
        } elseif (Mage::registry("videogallery_data")) {
            $form->setValues(Mage::registry("videogallery_data")->getData());
        }

        return parent::_prepareForm();
    }
}
