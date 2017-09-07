<?php
class Encomage_Quotes_Block_Adminhtml_Quotes_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
 
    protected function _construct()
    {
        $this->setId('quotesGrid');
        $this->_controller = 'adminhtml_quotes';
        $this->setUseAjax(true);
        
        $this->setDefaultSort('id');
        $this->setDefaultDir('desc');
    }
 
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('encomage_quotes/quote_collection');
        $this->setCollection($collection);
 
        return parent::_prepareCollection();
    }
 
    protected function _prepareColumns()
    { 
        $this->addColumn('id', array(
            'header'        => $this->__('ID'),
            'align'         => 'right',
            'width'         => '20px',
            'filter_index'  => 'id',
            'index'         => 'id'
        ));
 
        $this->addColumn('name', array(
            'header'        => $this->__('Title'),
            'align'         => 'left',
            'filter_index'  => 'name',
            'index'         => 'name',
            'type'          => 'text',
            'truncate'      => 50,
            'escape'        => true,
        ));
        
        $this->addColumn('action', array(
            'header'    => $this->__('Action'),
            'width'     => '50px',
            'type'      => 'action',
            'getter'     => 'getId',
            'actions'   => array(
                array(
                    'caption' => $this->__('Edit'),
                    'url'     => array(
                        'base'=>'*/*/edit',
                    ),
                    'field'   => 'id'
                )
            ),
            'filter'    => false,
            'sortable'  => false,
            'index'     => 'id',
        ));
 
        return parent::_prepareColumns();
    }
 
    public function getRowUrl($quotes)
    {
        return $this->getUrl('*/*/edit', array(
            'id' => $quotes->getId(),
        ));
    }
    
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid');
    }
}
