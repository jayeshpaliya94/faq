<?php
namespace Commercepundit\Faq\Block;

use Magento\Framework\View\Element\Template;
use Commercepundit\Faq\Model\FaqFactory;

/**
 * Faq List block
 */
class Demo extends Template
{
    protected $_faqList;
    
    /**
     * @param Template\Context $context
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        array $data = [],
        FaqFactory $faqList
    ) {
        parent::__construct($context, $data);
        $this->_faqList = $faqList;
    }
 
    public function getFaqData()
    {
         /**
         * Retrieve Faq Data
         *
         */
        $test = $this->_faqList->create();
        $collection = $test->getCollection()
        ->addFieldToFilter('status', 1);
        return $collection;
    }
}