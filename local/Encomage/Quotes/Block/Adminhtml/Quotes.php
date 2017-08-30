<?php
class Encomage_Quotes_Block_Adminhtml_Quotes extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    protected function _construct()
    {
        $this->_addButtonLabel = Mage::helper('encomage_quotes')->__('Add New Quote');
 
        $this->_blockGroup = 'encomage_quotes';
        $this->_controller = 'adminhtml_quotes';
        $this->_headerText = Mage::helper('encomage_quotes')->__('Quotes');
    }
}
