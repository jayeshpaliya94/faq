<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Commercepundit\Faq\Block\Adminhtml;

/**
 * Admin tax rule content block
 */
class Post extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_post';
        $this->_blockGroup = 'Commercepundit_Faq';
        $this->_headerText = __('frequently asked questions');
        //$this->_addButtonLabel = __('Add New Condition');
        parent::_construct();
    }
}
