<?php

namespace VipCard\Infomation\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use VipCard\Infomation\Model\VipCardFactory;
use VipCard\Infomation\Model\LinkedDynamicFactory;
use Magento\Framework\Session\SessionManagerInterface;

abstract class VipCard extends \Magento\Backend\App\Action
{
    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        VipCardFactory $vipCardFactory,
        LinkedDynamicFactory $linkedDynamicFactory,
        SessionManagerInterface $coreSession
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->resultPageFactory = $resultPageFactory;
        $this->vipCardFactory = $vipCardFactory;
        $this->linkedDynamicFactory = $linkedDynamicFactory;
        $this->coreSession = $coreSession;
    }

    /**
     * News access rights checking
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('VipCard_Infomation::parent');
    }
}