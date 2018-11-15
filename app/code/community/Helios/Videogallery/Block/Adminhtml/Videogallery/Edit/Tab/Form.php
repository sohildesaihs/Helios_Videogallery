<?php
class Helios_Videogallery_Block_Adminhtml_Videogallery_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
		protected function _prepareForm()
		{

				$form = new Varien_Data_Form();
				$this->setForm($form);
				$fieldset = $form->addFieldset("videogallery_form", array("legend"=>Mage::helper("videogallery")->__("Video Gallery Information")));
				$fieldset->addField("name", "label", array(
					"label" => Mage::helper("videogallery")->__("Video Name"),
					"class" => "required-entry",
					"required" => false,
					"name" => "videogallery_url",
				));	
                $fieldset->addField("videogallery_url", "text", array(
					"label" => Mage::helper("videogallery")->__("Enter Youtube URL"),
					"class" => "required-entry",
					"required" => true,
					"name" => "videogallery_url",
				));
						
				if (Mage::getSingleton("adminhtml/session")->getVideogalleryData())
				{
					$form->setValues(Mage::getSingleton("adminhtml/session")->getVideogalleryData());
					Mage::getSingleton("adminhtml/session")->setVideogalleryData(null);
				} 
				elseif(Mage::registry("videogallery_data")) {
				    $form->setValues(Mage::registry("videogallery_data")->getData());
				}
				return parent::_prepareForm();
		}
}
