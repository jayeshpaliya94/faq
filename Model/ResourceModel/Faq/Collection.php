<?php
namespace Commercepundit\Faq\Model\ResourceModel\Faq;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	/**
     * Constructor
     * Configures collection
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(
            \Commercepundit\Faq\Model\Faq::class,
            \Commercepundit\Faq\Model\ResourceModel\Faq::class
        );
    }
}