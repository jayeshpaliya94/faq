<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Commercepundit\Faq\Controller\Adminhtml\Post;

use Magento\Framework\App\Action\HttpGetActionInterface as HttpGetActionInterface;
use Commercepundit\Faq\Controller\Adminhtml\Post as Post;

class Index extends Post implements HttpGetActionInterface
{
    /**
     * @return void
     */
    public function execute()
    {
        $this->_initAction()->_addContent(
            $this->_view->getLayout()->createBlock(\Commercepundit\Faq\Block\Adminhtml\Post::class)
        );
        $this->_view->getPage()->getConfig()->getTitle()->prepend(__('Frequently Asked Question'));
        $this->_view->renderLayout();
    }
}