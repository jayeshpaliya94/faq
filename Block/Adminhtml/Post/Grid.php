<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Commercepundit\Faq\Block\Adminhtml\Post;
use Commercepundit\Faq\Model\PostFactory;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    protected $_faq;
    /**
     * @param GridCollectionFactory
     */
    private $gridCollectionFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
    * @codeCoverageIgnore
     */
    public function __construct(
        \Commercepundit\Faq\Model\FaqFactory $faq,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        array $data = []
       
    ) {
       $this->_faq = $faq;
       parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setDefaultSort('faq_id');
        $this->setId('postGrid');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    /**
     * @return $this
     * @codeCoverageIgnore
     */
    protected function _prepareCollection()
    {   
        $this->setCollection($this->_faq->create()->getCollection());
        
    }

    /**
     * @return $this
     */
    protected function _prepareColumns()
    {
        $this->addColumn(
            'faq_id',
            [
                'header' => __('Faq ID'),
                'index' => 'faq_id',
                'header_css_class' => 'col-id',
                'column_css_class' => 'col-id'
            ]
        );

        $this->addColumn(
            'Name',
            [
                'header' => __('Name'),
                'index' => 'name'
            ]
        );

        $this->addColumn(
            'Email',
            [
                'header' => __('Email'),
                'index' => 'email'
            ]
        );

        $this->addColumn(
            'Question',
            [
                'header' => __('Question'),
                'index' => 'question'
            ]
        );
        
        $this->addColumn(
            'Notes',
            [
                'header' => __('notes'),
                'index' => 'notes'
            ]
        );
 

        // if (!$this->_storeManager->isSingleStoreMode()) {
        //     $this->addColumn(
        //         'stores',
        //         [
        //             'header' => __('Store View'),
        //             'index' => 'stores',
        //             'type' => 'store',
        //             'store_all' => true,
        //             'store_view' => true,
        //             'sortable' => false,
        //             'filter_condition_callback' => [$this, '_filterStoreCondition'],
        //             'header_css_class' => 'col-store-view',
        //             'column_css_class' => 'col-store-view'
        //         ]
        //     );
        // }

        $this->addColumn(
            'is_active',
            [
                'header' => __('Status'),
                'index' => 'is_active',
                'type' => 'options',
                'options' => [0 => __('Disabled'), 1 => __('Enabled')],
                'header_css_class' => 'col-status',
                'column_css_class' => 'col-status'
            ]
        );

        return parent::_prepareColumns();
    }

    /**
     * @return void
     */
    protected function _afterLoadCollection()
    {
        $this->getCollection()->walk('afterLoad');
        parent::_afterLoadCollection();
    }

    /**
     * @param \Magento\Framework\Data\Collection $collection
     * @param \Magento\Backend\Block\Widget\Grid\Column $column
     * @return void
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    protected function _filterStoreCondition($collection, $column)
    {     
        if (!($value = $column->getFilter()->getValue())) {
            return;
        }

        $this->getCollection()->addStoreFilter($value);
    }

    /**
     * @param \Magento\Framework\DataObject $row
     * @return string
     * @codeCoverageIgnore
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('faq/*/edit', ['faq_id' => $row->getId()]);
    }


    /**
	 * @return $this
	 */
	 








}
