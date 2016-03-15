<?php

class DN_Testimonials_Model_Testimonialss extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('testimonials/testimonialss'); /* driver is the frontname and order is current file name */
    }
   
    
}
