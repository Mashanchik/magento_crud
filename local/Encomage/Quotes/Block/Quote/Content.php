<?php
class Encomage_Quotes_Block_Quote_Content extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        $this->setTemplate('encomage/quotes/quote/view.phtml');
    }
    
    public function getQuote()
    {
        return Mage::getModel('encomage_quotes/quote')->load($this->getQuoteId());
    }
}
