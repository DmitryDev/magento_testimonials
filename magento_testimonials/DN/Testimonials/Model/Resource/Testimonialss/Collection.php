<?php

class DN_Testimonials_Model_Resource_Testimonialss_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('testimonials/testimonialss');
    }
}
