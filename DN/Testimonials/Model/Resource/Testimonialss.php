<?php

class DN_Testimonials_Model_Resource_Testimonialss extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        // Note that the id refers to the key field in your database table and it is a primary key.
        $this->_init('testimonials/customer_testimonialss', 'id');
    }
}
