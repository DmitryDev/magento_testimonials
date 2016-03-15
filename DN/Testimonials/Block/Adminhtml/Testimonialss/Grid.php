<?php

class DN_Testimonials_Block_Adminhtml_Testimonialss_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('testimonialGrid');
        $this->setDefaultSort('id');// sorting according to which colunm name
    }

    protected function _prepareCollection() {
       
        $collection = Mage::getModel('testimonials/testimonialss')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('id', array(
            'header' => Mage::helper('testimonials')->__('ID'),
            'width' => '10%',
            'index' => 'id',
        ));

    
        
        $this->addColumn('status', array(
                    'header'    => Mage::helper('core')->__('status'),
                    'align'     =>'center',
                'width'     => '10%',
                'height'     => '100px',
                'filter'    => false,
                'sortable'  => false,
                'renderer'  => 'DN_testimonials_Block_Adminhtml_Testimonialss_Renderer_Status',


                ));

        $this->addColumn('action', array(
            'header' => Mage::helper('testimonials')->__('Action'),
            'width' => '100',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => Mage::helper('testimonials')->__('View'),
                    'url' => array('base' => '*/*/edit'),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'stores',
            'is_system' => true,
        ));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction() {


     
            $this->setMassactionIdField('testimonials_id');
            $this->getMassactionBlock()->setFormFieldName('testimonials_id');

            $this->getMassactionBlock()->addItem('delete', array(
                'label' => Mage::helper('	core')->__('Delete'),
                'url' => $this->getUrl('*/*/massDelete'),
                'confirm' => Mage::helper('core')->__('Are you sure?')
            ));
       
        return $this;
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}

