<?php
class Encomage_Quotes_Block_Quote_Content extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        $this->setTemplate('encomage/quotes/quote/view.phtml');
    }

    public function getEditUrl($id)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $id
        ));
    }

    public function getDeleteUrl($id)
    {
        return $this->getUrl('*/*/delete', array(
            'id' => $id
        ));
    }

    public function getBackUrl()
    {
        return $this->getUrl('*/*/', null);
    }

    public function getQuote()
    {
        return Mage::getModel('encomage_quotes/quote')->load($this->getQuoteId());
    }
}
