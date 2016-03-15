<?php

class DN_Testimonials_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexAction() {

        $this->loadLayout();
        $this->renderLayout();
    }

    public function formAction() {

        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction() {

        try {
            $model = Mage::getModel('testimonials/testimonialss');
            $data = $this->getRequest()->getParams();

            $now = time();
            $model->setData($data);
            $model->save();

            Mage::getSingleton('core/session')->addSuccess(Mage::helper('core')->__('Testimonial has been successfully saved.'));
        } catch (Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
        }
        $this->_redirectReferer();
    }

}

