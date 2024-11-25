<?php
namespace Commercepundit\Faq\Block;
//use Magento\Customer\Helper\View as CustomerViewHelper;

/**
 * Faq Block
 */
class Form extends \Magento\Framework\View\Element\Template
{
    /**
     * Customer session
     *
     * @var \Magento\Customer\Model\Session
     */
   // protected $_customerSession;

    /**
     * @var \Magento\Customer\Helper\View
     */
    //protected $_customerViewHelper;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Customer\Model\Session $customerSession
     * @param CustomerViewHelper $customerViewHelper
     */
    //public function __construct(
        //\Magento\Store\Model\StoreManagerInterface $storeManager,
        //\Magento\Backend\Block\Template\Context $context
        
        //\Magento\Framework\App\Helper\Context $context
        //\Magento\Customer\Model\Session $customerSession,
        //CustomerViewHelper $customerViewHelper
    //)
    //{    
        //$this->_storeManager = $storeManager;       
       // parent::__construct($context);

        //$this->_customerSession = $customerSession;
        //$this->_customerViewHelper = $customerViewHelper;
        //parent::__construct($context);
    //}



    //public function getStoreId()
    //{
        //return $this->_storeManager->getStore()->getId();
    //}

    /**
     * Get user name
     *
     * @return string
     */
    // public function getUserName()
    // {
    //     if (!$this->_customerSession->isLoggedIn()) {
    //         return '';
    //     }
    //     /**
    //      * @var \Magento\Customer\Api\Data\CustomerInterface $customer
    //      */
    //     $customer = $this->_customerSession->getCustomerDataObject();

    //     return trim($this->_customerViewHelper->getCustomerName($customer));
    // }

    /**
     * Get user email
     *
     * @return string
     */
    // public function getUserEmail()
    // {
    //     if (!$this->_customerSession->isLoggedIn()) {
    //         return '';
    //     }
    //     /**
    //      * @var CustomerInterface $customer
    //      */
    //     $customer = $this->_customerSession->getCustomerDataObject();

    //     return $customer->getEmail();
    // }


}                                                                     