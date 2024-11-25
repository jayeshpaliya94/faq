<?php 
namespace Commercepundit\Faq\Model;

class Faq extends \Magento\Framework\Model\AbstractModel
{
	/**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Commercepundit\Faq\Model\ResourceModel\Faq::class);
    }
}