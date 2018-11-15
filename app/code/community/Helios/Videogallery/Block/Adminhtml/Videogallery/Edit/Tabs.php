<?php
class Helios_Videogallery_Block_Adminhtml_Videogallery_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
		public function __construct()
		{
				parent::__construct();
				$this->setId("videogallery_tabs");
				$this->setDestElementId("edit_form");
				$this->setTitle(Mage::helper("videogallery")->__("Video Gallery Section"));
		}
		protected function _beforeToHtml()
		{
				$this->addTab("form_section", array(
				"label" => Mage::helper("videogallery")->__("Video Gallery"),
				"title" => Mage::helper("videogallery")->__("Video Gallery"),
				"content" => $this->getLayout()->createBlock("videogallery/adminhtml_videogallery_edit_tab_form")->toHtml(),
				));
				return parent::_beforeToHtml();
		}

}
