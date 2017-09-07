<?php
class Encomage_Quotes_Block_Form extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        $this->setTemplate('encomage/quotes/form.phtml');
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