<?php
class Encomage_Quotes_Model_Resource_Quote extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('encomage_quotes/quote', 'id');
    }
}
