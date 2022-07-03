<?php

namespace Commercers\CronjobManager\Controller\Adminhtml\Config\Job;

use Commercers\CronjobManager\Helper\JobConfig;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action\Context;
use Magento\Backend\App\Action;
use Magento\Framework\App\CacheInterface;

class MassRestoreSystemDefault extends Action
{
    const ADMIN_RESOURCE = "Commercers_CronjobManager::cronjobmanager";

    const SYSTEM_DEFAULT_IDENTIFIER = 'system_default';
    
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $resultPageFactory;
    
    /**
     * @var JobConfig
     */
    private $helper;
    
    /**
     * @var CacheInterface
     */
    private $cache;
    
    /**
     * @param PageFactory $resultPageFactory
     * @param Context $context
     * @param JobConfig $helper
     * @param CacheInterface $cache
     */
    public function __construct(
        PageFactory $resultPageFactory,
        Context $context,
        JobConfig $helper,
        CacheInterface $cache
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->helper = $helper;
        $this->cache = $cache;
    }
    
    /**
     * Save cronjob
     *
     * @return Void
     */
    public function execute()
    {
        $params = $this->getRequest()->getParam('selected');
        if (!isset($params)) {
            $this->getMessageManager()->addErrorMessage("Something went wrong when recieving the request");
            $this->_redirect('*/config/index');
            return;
        }
        try {
            foreach ($params as $jobCode) {
                $path = $this->helper->constructFrequencyPath($jobCode);
                $this->helper->restoreSystemDefault($path);
            }
            $this->cache->remove(self::SYSTEM_DEFAULT_IDENTIFIER);
        } catch (\Exception $e) {
            $this->getMessageManager()->addErrorMessage($e->getMessage());
            $this->_redirect('*/config/index/');
            return;
        }
        $this->getMessageManager()->addSuccessMessage("Successfully restored system defaults");
        $this->_redirect("*/config/index/");
    }
}
