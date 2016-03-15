<?php

class StoreTestimonials_Model_Commentss extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('testimonials/testimonials'); /* driver is the frontname and order is current file name */
    }
   
    
}
