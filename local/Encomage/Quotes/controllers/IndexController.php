<?php

class Encomage_Quotes_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout()
            ->renderLayout();
    }

    public function formAction()
    {
        $this->loadLayout()
            ->renderLayout();
    }

    public function editAction()
    {
        $this->_title($this->__('Edit quote'));
        $quote_id = (int)$this->getRequest()->getParam('id', null);
        $quote = Mage::getModel('encomage_quotes/quote')->load($quote_id);
        Mage::register('current_quote', $quote);
        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();

        $session = Mage::getSingleton('core/session');
        $quote = Mage::getModel('encomage_quotes/quote');
        $quote->setData('name', $data['name']);
        $quote->setData('userid', Mage::getSingleton('customer/session')->getCustomer()->getId());
        $quote->setData('dscr', $data['dscr']);
        $quote->setData('create', now());

        try{
            $quote->save();
            $session->addSuccess($this->__('Quote successfully saved'));
        }catch(Exception $e){
            $session->addError($this->__('Somethings went wrong'));
        }
        $this->_redirect('*/*/');
    }

    public function deleteAction()
    {
        $tipId = $this->getRequest()->getParam('id', false);

        try {
            Mage::getModel('encomage_quotes/quote')->setId($tipId)->delete();
            Mage::getSingleton('customer/session')->addSuccess($this->__('Quote successfully deleted'));

            return $this->_redirect('*/*/');
        } catch (Mage_Core_Exception $e){
            Mage::getSingleton('customer/session')->addError($e->getMessage());
        } catch (Exception $e) {
            Mage::logException($e);
            Mage::getSingleton('customer/session')->addError($this->__('Somethings went wrong'));
        }

        $this->_redirect('*/*/');
    }


    public function viewAction()
    {
        $quote_id = (int)$this->getRequest()->getParam('id');
        if (!$quote_id) {
            $this->_forward('noRoute');
        }
        $this->loadLayout();
        $this->getLayout()
            ->getBlock('quote.item')
            ->setQuoteId($quote_id);
        try {
            $this->renderLayout();
        } catch (Exception $e) {
            Mage::logException($e);
            $this->_forward('noRoute');
        }
    }
}
