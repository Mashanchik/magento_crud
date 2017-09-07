<?php
class Encomage_Quotes_Block_Adminhtml_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    protected function _construct()
    {
        $this->_blockGroup = 'encomage_quotes';
        $this->_mode = 'edit';
        $this->_controller = 'adminhtml';
    }
 
    public function getHeaderText()
    {
        $quote = Mage::registry('current_quote');
        if ($quote->getId()) { 
            return $this->__("Edit Quote '%s'", $this->escapeHtml($quote->getName()));
        } else {
            return $this->__("Add new Quote");
        }
    }
}
