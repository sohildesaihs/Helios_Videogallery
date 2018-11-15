<?php

/**
 * Class Helios_Videogallery_Adminhtml_Rss_RssController
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Adminhtml_Rss_RssController extends Mage_Core_Controller_Front_Action
{
    public function videogalleryAction()
    {
        $this->getResponse()->setHeader('Content-type', 'text/xml; charset=UTF-8');
        $this->loadLayout(false);
        $this->renderLayout();
    }

    public function preDispatch()
    {
        if ($this->getRequest()->getActionName() == 'videogallery') {
            $this->_currentArea = 'adminhtml';
            Mage::helper('rss')->authAdmin('helios/videogallery');
        }

        return parent::preDispatch();
    }
}