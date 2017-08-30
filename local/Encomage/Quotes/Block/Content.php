<?php
class Encomage_Quotes_Block_Content extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        $this->setTemplate('encomage/quotes/view.phtml');
    }
    
    public function getRowUrl(Encomage_Quotes_Model_Quote $quote)
    {
        return $this->getUrl('*/*/view', array(
            'id' => $quote->getId()
        ));
    }
    
    public function getCollection()
    {
        return Mage::getModel('encomage_quotes/quote')->getCollection();
    }
}
