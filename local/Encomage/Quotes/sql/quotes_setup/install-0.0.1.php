<?php
$installer = $this;
$tableQuotes = $installer->getTable('encomage_quotes/quote');

$installer->startSetup();

$installer->getConnection()->dropTable($tableQuotes);
$table = $installer->getConnection()
    ->newTable($tableQuotes)
    ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
    ))
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
    ))
    ->addColumn('dscr', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
        'nullable'  => false,
    ));

$installer->getConnection()->createTable($table);

$installer->endSetup();