<?php
class Encomage_Quotes_Model_Resource_Quote_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('encomage_quotes/quote');
    }
}