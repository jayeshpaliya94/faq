<?php 
namespace Commercepundit\Faq\Model\ResourceModel;

class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Initialize resource model. Get tablename from config
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('commercepundit_faq', 'faq_id');
    }
}