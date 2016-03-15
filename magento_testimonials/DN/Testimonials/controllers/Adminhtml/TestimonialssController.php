<?php

class DN_Testimonials_Adminhtml_TestimonialssController extends Mage_Adminhtml_Controller_action {

    public function indexAction() {
        $this->loadLayout();

        /** set active menu* */
        $this->_setActiveMenu('dntestimonials/testimonials');
        $this->_addContent($this->getLayout()->createBlock('testimonials/adminhtml_testimonialss'));
        $this->renderLayout();
    }

    public function editAction() {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('testimonials/testimonialss')->load($id);

        if ($model->getId() || $id == 0) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if (!empty($data)) {
                $model->setData($data);
            }
            
            Mage::register('customer_data', $model);

            $this->loadLayout();
            $this->_setActiveMenu('ggpfast/driver');

            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('testimonials/adminhtml_testimonialss_edit'))
                    ->_addLeft($this->getLayout()->createBlock('testimonials/adminhtml_testimonialss_edit_tabs'));

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('testimonials')->__('Driver Location does not exist'));
            $this->_redirect('*/*/');
        }
    }

    public function newAction() {
        $this->_forward('edit');
    }

    public function saveAction() {
            $id = $this->getRequest()->getParam('id');
            $data = $this->getRequest()->getPost();

        if ($data = $this->getRequest()->getPost()) {

                $driverOrder = Mage::getModel('testimonials/testimonialss');
           
                $model = Mage::getModel('testimonials/testimonialss');

                $driverData = $data;

                $model->setData($driverData)
                        ->setId($this->getRequest()->getParam('id'));


                try {


                    $model->save();

                 

                    Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('testimonials')->__('Status Successfully Updated.'));
                    Mage::getSingleton('adminhtml/session')->setFormData(false);

                    if ($this->getRequest()->getParam('back')) {
                        $this->_redirect('*/*/edit', array('id' => $model->getId()));
                        return;
                    }
                    $this->_redirect('*/*/');
                    return;
                } catch (Exception $e) {
                    Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                    Mage::getSingleton('adminhtml/session')->setFormData($data);
                    $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                    return;
                }
            }
       
       
        $this->_redirect('*/*/');
    }

    public function deleteAction() {
        if ($this->getRequest()->getParam('id') > 0) {
            try {
                $model = Mage::getModel('testimonials/testimonialss');

                $model->setId($this->getRequest()->getParam('id'))
                        ->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Customer testimonials successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }

    public function massDeleteAction() {
        $driverIds = $this->getRequest()->getParam('testimonials_id');
        if (!is_array($driverIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select Customer testimonialss(s)'));
        } else {
            try {
                foreach ($driverIds as $driverId) {
                    $driver = Mage::getModel('testimonials/testimonialss')->load($driverId);
                    $driver->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                        Mage::helper('adminhtml')->__(
                                'Total of %d record(s) is successfully deleted', count($driverIds)
                        )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

}

