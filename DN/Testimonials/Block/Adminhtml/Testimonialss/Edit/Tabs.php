<?php

class DN_Testimonials_Block_Adminhtml_Testimonialss_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

 public function __construct()
  {
      parent::__construct();
      $this->setId('driver_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('testimonials')->__('Customer testimonials'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('testimonials')->__('Customer testimonials'),
          'title'     => Mage::helper('testimonials')->__('Customer testimonials'),
          'content'   => $this->getLayout()->createBlock('testimonials/adminhtml_testimonialss_edit_tab_form')->toHtml(),
      ));
     
      return parent::_beforeToHtml();
  }
}
