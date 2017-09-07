<?php
class Encomage_Quotes_Adminhtml_QuotesController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Quotes'));

        $this->loadLayout();
        $this->_setActiveMenu('encomage_quotes');
        $this->renderLayout();
    }
    
    public function newAction()
    {
        $this->_forward('edit');
    }
    
    public function editAction()
    {
        $this->_title($this->__('Edit quote'));
        $quote_id = (int)$this->getRequest()->getParam('id', null);
        $quote = Mage::getModel('encomage_quotes/quote')->load($quote_id);
        Mage::register('current_quote', $quote);
        $this->loadLayout();
        $this->_setActiveMenu('encomage_quotes');
        $this->renderLayout();
    }
    
    public function deleteAction()
    {
        $tipId = $this->getRequest()->getParam('id', false);
 
        try {
            Mage::getModel('encomage_quotes/quote')->setId($tipId)->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('encomage_quotes')->__('Quote successfully deleted'));
            
            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
        }
 
        $this->_redirectReferer();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        if (!empty($data)) {
            try {
                Mage::getModel('encomage_quotes/quote')->setData($data)
                    ->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('encomage_quotes')->__('Quote successfully saved'));
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            } catch (Exception $e) {
                Mage::logException($e);
                Mage::getSingleton('adminhtml/session')->addError($this->__('Somethings went wrong'));
            }
        }
        return $this->_redirect('*/*/');
    }
    
    public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('encomage_quotes/adminhtml_quotes_grid')->toHtml()
        );
    }
}
