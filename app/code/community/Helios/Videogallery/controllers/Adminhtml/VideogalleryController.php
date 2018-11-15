<?php

class Helios_Videogallery_Adminhtml_VideogalleryController extends Mage_Adminhtml_Controller_Action
{
		protected function _initAction()
		{				
				$this->loadLayout()->_setActiveMenu("videogallery/videogallery")->_addBreadcrumb(Mage::helper("adminhtml")->__("Videogallery  Manager"),Mage::helper("adminhtml")->__("Videogallery Manager"));
				return $this;
		}
		public function indexAction() 
		{		
			    $this->_title($this->__("Videogallery"));
			    $this->_title($this->__("Manager Videogallery"));
				$this->_initAction();
				$this->renderLayout();
		}
		public function editAction()
		{			    
			    $this->_title($this->__("Videogallery"));
				$this->_title($this->__("Videogallery"));
			    $this->_title($this->__("Edit Item"));
				
				$id = $this->getRequest()->getParam("id");
				$model = Mage::getModel("videogallery/videogallery")->load($id);
				if ($model->getId()) {
					Mage::register("videogallery_data", $model);
					$this->loadLayout();
					$this->_setActiveMenu("videogallery/videogallery");
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Videogallery Manager"), Mage::helper("adminhtml")->__("Videogallery Manager"));
					$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Videogallery Description"), Mage::helper("adminhtml")->__("Videogallery Description"));
					$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
					$this->_addContent($this->getLayout()->createBlock("videogallery/adminhtml_videogallery_edit"))->_addLeft($this->getLayout()->createBlock("videogallery/adminhtml_videogallery_edit_tabs"));
					$this->renderLayout();
				} 
				else {
					Mage::getSingleton("adminhtml/session")->addError(Mage::helper("videogallery")->__("Item does not exist."));
					$this->_redirect("*/*/");
				}
		}

		public function newAction()
		{

		$this->_title($this->__("Videogallery"));
		$this->_title($this->__("Videogallery"));
		$this->_title($this->__("New Item"));

        $id   = $this->getRequest()->getParam("id");
		$model  = Mage::getModel("videogallery/videogallery")->load($id);

		$data = Mage::getSingleton("adminhtml/session")->getFormData(true);
		if (!empty($data)) {
			$model->setData($data);
		}

		Mage::register("videogallery_data", $model);

		$this->loadLayout();
		$this->_setActiveMenu("videogallery/videogallery");

		$this->getLayout()->getBlock("head")->setCanLoadExtJs(true);

		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Videogallery Manager"), Mage::helper("adminhtml")->__("Videogallery Manager"));
		$this->_addBreadcrumb(Mage::helper("adminhtml")->__("Videogallery Description"), Mage::helper("adminhtml")->__("Videogallery Description"));


		$this->_addContent($this->getLayout()->createBlock("videogallery/adminhtml_videogallery_edit"))->_addLeft($this->getLayout()->createBlock("videogallery/adminhtml_videogallery_edit_tabs"));

		$this->renderLayout();

		}
		public function saveAction()
		{

			$post_data=$this->getRequest()->getPost();
				if ($post_data) {
                    $url_key = $post_data['videogallery_url'];
                    $url_key = explode('?v=',$url_key);
                    $content = file_get_contents("http://youtube.com/get_video_info?video_id=".$url_key[1]);
                    parse_str($content, $name);
                    $videoname = $name['title'];
                    echo $videoname;
					try {
                        $model = Mage::getModel("videogallery/videogallery")
						->addData($post_data)
						->setId($this->getRequest()->getParam("id"))
                        ->setName($videoname)
                        ->save();

						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Videogallery was successfully saved"));
						Mage::getSingleton("adminhtml/session")->setVideogalleryData(false);

						if ($this->getRequest()->getParam("back")) {
							$this->_redirect("*/*/edit", array("id" => $model->getId()));
							return;
						}
						$this->_redirect("*/*/");
						return;
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						Mage::getSingleton("adminhtml/session")->setVideogalleryData($this->getRequest()->getPost());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					return;
					}

				}
				$this->_redirect("*/*/");
		}



		public function deleteAction()
		{
				if( $this->getRequest()->getParam("id") > 0 ) {
					try {
						$model = Mage::getModel("videogallery/videogallery");
						$model->setId($this->getRequest()->getParam("id"))->delete();
						Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
						$this->_redirect("*/*/");
					} 
					catch (Exception $e) {
						Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
						$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
					}
				}
				$this->_redirect("*/*/");
		}

		
		public function massRemoveAction()
		{
			try {
				$ids = $this->getRequest()->getPost('videogallery_ids', array());
				foreach ($ids as $id) {
                      $model = Mage::getModel("videogallery/videogallery");
					  $model->setId($id)->delete();
				}
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
			}
			catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
			}
			$this->_redirect('*/*/');
		}
			
		/**
		 * Export order grid to CSV format
		 */
		public function exportCsvAction()
		{
			$fileName   = 'videogallery.csv';
			$grid       = $this->getLayout()->createBlock('videogallery/adminhtml_videogallery_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
		} 
		/**
		 *  Export order grid to Excel XML format
		 */
		public function exportExcelAction()
		{
			$fileName   = 'videogallery.xml';
			$grid       = $this->getLayout()->createBlock('videogallery/adminhtml_videogallery_grid');
			$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
		}
}
