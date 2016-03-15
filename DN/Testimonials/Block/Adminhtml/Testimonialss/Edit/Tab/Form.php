<?php

class Dn_Testimonials_Block_Adminhtml_Testimonialss_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('testimonials_form', array('legend' => Mage::helper('testimonials')->__('Customer Testimonials Details')));

        
        $fieldset->addField('testimonials', 'textarea', array(
            'label' => Mage::helper('testimonials')->__('Testimonials'),
            'class' => 'required-entry',
            'required' => true,
           
            'name' => 'testimonials',
        ));
        
       
       $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('testimonials')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('testimonials')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('testimonials')->__('Disabled'),
              ),
          ),
      ));


        if (Mage::getSingleton('adminhtml/session')->getDriverData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getDriverData());
            Mage::getSingleton('adminhtml/session')->setDriverData(null);
        } elseif (Mage::registry('customer_data')) {
            $form->setValues(Mage::registry('customer_data')->getData());
        }
        return parent::_prepareForm();
    }

}
