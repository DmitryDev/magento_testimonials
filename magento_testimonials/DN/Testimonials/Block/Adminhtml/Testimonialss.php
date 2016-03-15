<?php

class DN_Testimonials_Block_Adminhtml_Testimonialss extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {

        $this->_controller = 'adminhtml_testimonialss';
        $this->_blockGroup = 'testimonials';
        $this->_headerText = Mage::helper('testimonials')->__('Customer testimonials');
        parent::__construct();       
        $this->_removeButton('add');
       
   
        
    }

}
