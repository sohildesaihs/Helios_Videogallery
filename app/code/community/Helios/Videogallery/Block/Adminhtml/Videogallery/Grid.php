<?php

/**
 * Class Helios_Videogallery_Block_Adminhtml_Videogallery_Grid
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Block_Adminhtml_Videogallery_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Helios_Videogallery_Block_Adminhtml_Videogallery_Grid constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setId("videogalleryGrid");
        $this->setDefaultSort("videogallery_id");
        $this->setDefaultDir("ASC");
        $this->setSaveParametersInSession(true);
    }

    /**
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel("videogallery/videogallery")->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * @return $this
     * @throws Exception
     */
    protected function _prepareColumns()
    {
        $this->addColumn("videogallery_id", array(
            "header" => $this->__("ID"),
            "align" => "center",
            "type" => "number",
            "index" => "videogallery_id",
        ));
        $this->addColumn("videogallery_url", array(
            "header" => $this->__("Video Thumbnail"),
            "index" => "videogallery_url",
            "align" => "center",
            "width" => "200px",
            'renderer' => 'videogallery/renderer_image',
        ));

        $this->addColumn("name", array(
            "header" => $this->__("Video Name"),
            "index" => "name",
        ));

        $this->addColumn('action', array(
            'header' => $this->__('Action'),
            'width' => '120',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => $this->__('Delete'),
                    'url' => array('base' => '*/*/delete'),
                    'field' => 'videogallery_id',
                    'confirm' => $this->__('Are you sure?')
                )
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'stores',
            'is_system' => true,
        ));
        $this->addRssList('videogallery/adminhtml_rss_rss/videogallery', $this->__('RSS'));
        $this->addExportType('*/*/exportCsv', $this->__('CSV'));
        $this->addExportType('*/*/exportExcel', $this->__('Excel'));

        return parent::_prepareColumns();
    }

    /**
     * @param $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl("*/*/edit", array("id" => $row->getId()));
    }

    /**
     * @return $this|Mage_Adminhtml_Block_Widget_Grid
     * @throws Varien_Exception
     */
    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('videogallery_id');
        $this->getMassactionBlock()->setFormFieldName('videogallery_ids');
        $this->getMassactionBlock()->setUseSelectAll(true);
        $this->getMassactionBlock()->addItem('remove_videogallery', array(
            'label' => $this->__('Delete Selected'),
            'url' => $this->getUrl('*/adminhtml_videogallery/massRemove'),
            'confirm' => $this->__('Are you sure?')
        ));

        return $this;
    }
}