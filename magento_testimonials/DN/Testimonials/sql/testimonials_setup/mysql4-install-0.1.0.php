<?php

$installer = $this;

$installer->startSetup();

$table = $installer->getTable('testimonials/customer_testimonialss');


$tableDdlObj = $installer->getConnection()
        ->newTable($table)
        ->addColumn("id", Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
            'identity' => true,
            'nullable' => false,
            'primary' =>  true,
            'unsigned' => true,
                ), 'Id')
	->addColumn("user_id", Varien_Db_Ddl_Table::TYPE_INTEGER, 11, array(
            'identity' => true,
            'nullable' => false,
            'primary' =>  false,
            'unsigned' => true,
                ), 'Customer Id')
          
        ->addColumn("testimonials", Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
                ), 'Testimonials')
        ->addColumn("status", Varien_Db_Ddl_Table::TYPE_TEXT, 200, array(
                ), 'status');
        

$installer->getConnection()->createTable($tableDdlObj);


$installer->endSetup();
