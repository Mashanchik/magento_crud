<?php
class Encomage_Quotes_Block_Edit extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        $this->setTemplate('encomage/quotes/edit.phtml');
    }

    public function getQuote()
    {
        return Mage::registry('current_quote');
    }

    public function getActionOfForm()
    {
        return $this->getUrl('*/*/save');
    }

    public function getBackUrl()
    {
        return $this->getUrl('*/*/', null);
    }
}