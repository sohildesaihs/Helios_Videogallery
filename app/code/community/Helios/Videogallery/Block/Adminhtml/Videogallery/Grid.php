<?php

class Helios_Videogallery_Block_Adminhtml_Videogallery_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

		public function __construct()
		{		
				parent::__construct();
				$this->setId("videogalleryGrid");
				$this->setDefaultSort("videogallery_id");
				$this->setDefaultDir("ASC");
				$this->setSaveParametersInSession(true);
		}

		protected function _prepareCollection()
		{
				$collection = Mage::getModel("videogallery/videogallery")->getCollection();
				$this->setCollection($collection);
				return parent::_prepareCollection();
		}
		protected function _prepareColumns()
		{
				$this->addColumn("videogallery_id", array(
				"header" => Mage::helper("videogallery")->__("ID"),
				"align" =>"center",
			    "type" => "number",
				"index" => "videogallery_id",
				));
                $this->addColumn("videogallery_url", array(
				"header" => Mage::helper("videogallery")->__("Video Thumbnail"),
				"index" => "videogallery_url",
                "align" =>"center",
                "width" => "200px",
                'renderer'  => 'videogallery/renderer_image',
				));

				$this->addColumn("name", array(
				"header" => Mage::helper("videogallery")->__("Video Name"),
				"index" => "name",
				));
                $this->addColumn('action',
                array(
                    'header' => Mage::helper('videogallery')->__('Action'),
                    'width' => '120',
                    'type' => 'action',
                    'getter' => 'getId',
                    'actions'   => array(
                        array(
                            'caption'   => Mage::helper('videogallery')->__('Delete Video'),
                            'url'       => array('base'=> '*/*/delete'),
                            'field'     => 'videogallery_id',
                            'confirm'  => Mage::helper('videogallery')->__('Are you sure?')
                        )
                    ),
                    'filter' => false,
                    'sortable' => false,
                    'index' => 'stores',
                    'is_system' => true,
                ));
		 $this->addRssList('videogallery/adminhtml_rss_rss/videogallery', Mage::helper('videogallery')->__('RSS'));
			$this->addExportType('*/*/exportCsv', Mage::helper('sales')->__('CSV')); 
			$this->addExportType('*/*/exportExcel', Mage::helper('sales')->__('Excel'));

				return parent::_prepareColumns();
		}

		public function getRowUrl($row)
		{
			   return $this->getUrl("*/*/edit", array("id" => $row->getId()));
		}


		
		protected function _prepareMassaction()
		{
			$this->setMassactionIdField('videogallery_id');
			$this->getMassactionBlock()->setFormFieldName('videogallery_ids');
			$this->getMassactionBlock()->setUseSelectAll(true);
			$this->getMassactionBlock()->addItem('remove_videogallery', array(
					 'label'=> Mage::helper('videogallery')->__('Remove From Videogallery'),
					 'url'  => $this->getUrl('*/adminhtml_videogallery/massRemove'),
					 'confirm' => Mage::helper('videogallery')->__('Are you sure?')
				));
			return $this;
		}
}