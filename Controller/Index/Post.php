<?php
namespace Commercepundit\Faq\Controller\Index;
 /**
 * Faq POST controller
 */
use Zend\Log\Filter\Timestamp;
use Magento\Framework\Controller\ResultFactory; 
use Commercepundit\Faq\Model\FaqFactory;
class Post extends \Magento\Framework\App\Action\Action
{
    //protected $storeManager;
    protected $_faq;
    protected $_inlineTranslation;
    protected $_transportBuilder;
    protected $_scopeConfig;
    protected $_logLoggerInterface;
     
    public function __construct(
        //\Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\App\Action\Context $context,
        \Commercepundit\Faq\Model\FaqFactory $faq,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation,
        \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Psr\Log\LoggerInterface $loggerInterface,
        array $data = []
        )
    {
        //$this->_storeManager = $storeManager;
        $this->_inlineTranslation = $inlineTranslation;
        $this->_transportBuilder = $transportBuilder;
        $this->_scopeConfig = $scopeConfig;
        $this->_faq = $faq;
        $this->_logLoggerInterface = $loggerInterface;
       
        $this->messageManager = $context->getMessageManager();
        parent::__construct($context);  
    }
     
    public function execute()
    {
        $post = (array) $this->getRequest()->getPost(); 
         
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $storeManager = $objectManager->create('\Magento\Store\Model\StoreManagerInterface');
        $storeId = $storeManager->getStore()->getId();
        
        //$currentStore = $this->_storeManagerInterface->getStore();
       // $currentStoreId = $currentStore->getId();
        
        $set_id = array('store_id' => $storeId);
        $s = $post + $set_id;
        
        //$storeId = $this->storeManager->getStore()->getId(); // returns 1


        // echo "<pre>";
        // print_r($s);
        // echo "</pre>"; die;
        
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT); 
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
		$model = $this->_faq->create();
		$model->addData($s);
        $saveData = $model->save();

        if($saveData)
        {
            $this->messageManager->addSuccess( __('Insert Record Successfully..!') );
        }else{
            $this->messageManager->addErrorMessage(__('Record  was not saved.'));
        }
        
        // Send Mail to Customer
        $this->_inlineTranslation->suspend();
        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        
        $sender = [
            'name' => $post['name'],
            'email' => $post['email']
        ];
            
        $transport = $this->_transportBuilder
        ->setTemplateIdentifier('career_general_customer_email_template')
        ->setTemplateOptions(
            [
                'area' => 'frontend',
                'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
            ])
            ->setTemplateVars([
                'name'  => $post['name'],
                'email'  => $post['email'],
                'question'  => $post['question'],
                'notes'  => $post['notes']
                //'store_id' => \Magento\Store\Model\Store::DEFAULT_STORE_ID
                //'store_id' => $post['store_id']
            ])
            ->setFrom($sender)
            ->addTo('jayesh.paliya@commercepundit.com','jayesh paliya')
                ->getTransport(); 
            //$store_id = $this->_storeManager->getStore()->getId();

            // if ($this->getRequest()->getParam('store')) {
            //     $store_id = $collection->addFieldToFilter('store_id', $this->getRequest()->getParam('store'));
            // }
            
            $transport->sendMessage();
             if($saveData)
            {
                $this->messageManager->addSuccess( __('Email sent successfully') );
            }else{
                $this->messageManager->addErrorMessage(__('Email Not sent successfully'));
            }
            $this->_inlineTranslation->resume();
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;

    }

    
}