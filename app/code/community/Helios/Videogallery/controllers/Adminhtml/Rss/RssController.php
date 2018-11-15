<?php

class Helios_Videogallery_Adminhtml_Rss_RssController extends Mage_Core_Controller_Front_Action
{
	
		public function videogalleryAction()
		{

			//DEMO RSS CONTENT
            //app\design\frontend\base\default\layout\rss.xml
			/*
				<rss_order_new>
					<block type="rss/order_new" output="toHtml" name="rss.order.new"/>
				</rss_order_new>
			*/
			//app\code\core\Mage\Rss\Block\Order\New.php
			//DEMO RSS CONTENT


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
	
	