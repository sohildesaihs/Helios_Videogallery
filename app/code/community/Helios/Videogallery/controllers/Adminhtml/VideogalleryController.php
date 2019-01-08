<?php

/**
 * Class Helios_Videogallery_Adminhtml_VideogalleryController
 *
 * @author Helios Solutions<support@heliossolutions.in>
 */
class Helios_Videogallery_Adminhtml_VideogalleryController extends Mage_Adminhtml_Controller_Action
{
    /**
     * @return $this
     */
    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu("videogallery/videogallery")
            ->_addBreadcrumb($this->__("Video Gallery  Manager"), $this->__("Video Gallery Manager"));

        return $this;
    }

    /**
     *
     */
    public function indexAction()
    {
        $this->_title($this->__("Video Gallery"));
        $this->_title($this->__("Video Gallery Manager"));
        $this->_initAction();
        $this->renderLayout();
    }

    /**
     * @throws Mage_Core_Exception
     * @throws Varien_Exception
     */
    public function editAction()
    {
        $this->_title($this->__("Video Gallery"));
        $this->_title($this->__("Video Gallery"));
        $this->_title($this->__("Edit Item"));

        $id = $this->getRequest()->getParam("id");
        $model = Mage::getModel("videogallery/videogallery")->load($id);

        if ($model->getId()) {
            Mage::register("videogallery_data", $model);
            $this->loadLayout();

            $this->_setActiveMenu("videogallery/videogallery");
            $this->_addBreadcrumb($this->__("Video Gallery Manager"), $this->__("Video Gallery Manager"));
            $this->_addBreadcrumb($this->__("Video Gallery Description"), $this->__("Video Gallery Description"));

            $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
            $this
                ->_addContent($this->getLayout()->createBlock("videogallery/adminhtml_videogallery_edit"))
                ->_addLeft($this->getLayout()->createBlock("videogallery/adminhtml_videogallery_edit_tabs"));

            $this->renderLayout();
        } else {
            Mage::getSingleton("adminhtml/session")->addError($this->__("Video item does not exist."));
            $this->_redirect("*/*/");
        }
    }

    /**
     * @throws Mage_Core_Exception
     * @throws Varien_Exception
     */
    public function newAction()
    {
        $this->_title($this->__("Video Gallery"));
        $this->_title($this->__("Video Gallery"));
        $this->_title($this->__("New Item"));

        $id = $this->getRequest()->getParam("id");
        $model = Mage::getModel("videogallery/videogallery")->load($id);
        $data = Mage::getSingleton("adminhtml/session")->getFormData(true);

        if (!empty($data)) {
            $model->setData($data);
        }

        Mage::register("videogallery_data", $model);

        $this->loadLayout();
        $this->_setActiveMenu("videogallery/videogallery");
        $this->getLayout()->getBlock("head")->setCanLoadExtJs(true);
        $this->_addBreadcrumb($this->__("Video Gallery Manager"), $this->__("Video Gallery Manager"));
        $this->_addBreadcrumb($this->__("Video Gallery Description"), $this->__("Video Gallery Description"));

        $this
            ->_addContent($this->getLayout()->createBlock("videogallery/adminhtml_videogallery_edit"))
            ->_addLeft($this->getLayout()->createBlock("videogallery/adminhtml_videogallery_edit_tabs"));

        $this->renderLayout();
    }

    /**
     * @throws Varien_Exception
     */
    public function saveAction()
    {
        $post_data = $this->getRequest()->getPost();
        if ($post_data) {
            $url_key = $post_data['videogallery_url'];
            $url_key = explode('?v=', $url_key);
            $content = file_get_contents("http://youtube.com/get_video_info?video_id=" . $url_key[1]);
            parse_str($content, $name);
            $videoname = $name['title'];
            echo $videoname;
            try {
                $model = Mage::getModel("videogallery/videogallery")
                    ->addData($post_data)
                    ->setId($this->getRequest()->getParam("id"))
                    ->setName($videoname)
                    ->save();

                Mage::getSingleton("adminhtml/session")->addSuccess($this->__("Video item successfully created"));
                Mage::getSingleton("adminhtml/session")->setVideogalleryData(false);

                if ($this->getRequest()->getParam("back")) {
                    $this->_redirect("*/*/edit", array("id" => $model->getId()));
                    return;
                }
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                Mage::getSingleton("adminhtml/session")->setVideogalleryData($this->getRequest()->getPost());
                $this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
                return;
            }
        }

        $this->_redirect("*/*/");
    }

    /**
     * @throws Varien_Exception
     */
    public function deleteAction()
    {
        $id = $this->getRequest()->getParam("videogallery_id");
        if ($id > 0) {
            try {
                $model = Mage::getModel("videogallery/videogallery");
                $model->setId($id)->delete();
                Mage::getSingleton("adminhtml/session")->addSuccess($this->__("Video item successfully deleted"));
                $this->_redirect("*/*/");
            } catch (Exception $e) {
                Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
                $this->_redirect("*/*/edit", array("id" => $id));
            }
        }

        $this->_redirect("*/*/");
    }

    /**
     * @throws Varien_Exception
     */
    public function massRemoveAction()
    {
        try {
            $ids = $this->getRequest()->getPost('videogallery_ids', array());
            foreach ($ids as $id) {
                $model = Mage::getModel("videogallery/videogallery");
                $model->setId($id)->delete();
            }
            Mage::getSingleton("adminhtml/session")->addSuccess($this->__("Selected video item(s) successfully removed"));
        } catch (Exception $e) {
            Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
        }

        $this->_redirect('*/*/');
    }

    /**
     * Export order grid to CSV format
     */
    public function exportCsvAction()
    {
        $fileName = Helios_Videogallery_Helper_Data::EXPORT_FILE_NAME . '.csv';
        $grid = $this->getLayout()->createBlock('videogallery/adminhtml_videogallery_grid');

        $this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
    }

    /**
     *  Export order grid to Excel XML format
     */
    public function exportExcelAction()
    {
        $fileName = Helios_Videogallery_Helper_Data::EXPORT_FILE_NAME . '.xml';
        $grid = $this->getLayout()->createBlock('videogallery/adminhtml_videogallery_grid');

        $this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
    }
}
