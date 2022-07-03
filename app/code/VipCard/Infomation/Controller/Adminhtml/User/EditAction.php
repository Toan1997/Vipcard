<?php
namespace VipCard\Infomation\Controller\Adminhtml\User;
use Magento\Framework\Controller\ResultFactory;

class EditAction extends \VipCard\Infomation\Controller\Adminhtml\VipCard
{

    public function execute()
    {
     //echo $this->getRequest()->getFullActionName();exit;
        $id = $this->getRequest()->getParam('id');
        if($id)
            $this->_getSession()->setId($id);
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend((__('User Management')));
        return $resultPage;
    }
}