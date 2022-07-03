<?php
namespace VipCard\Infomation\Controller\Adminhtml\User;
use VipCard\Infomation\Model\VipCardFactory;

class Index extends \Magento\Backend\App\Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Backend\Model\Auth\Session $adminSession,
        VipCardFactory $vipCardFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_adminSession = $adminSession;
        $this->vipCardFactory = $vipCardFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $user = $this->_adminSession->getUser();
        $userRole = $this->_adminSession->getUser()->getRole();
        $userId = $user->getId();

        if($userRole->getId() == 38){
       
            $vipCardFactory = $this->vipCardFactory->create();
            $vipCard =  $vipCardFactory->getCollection()
                            ->addFieldToFilter('admin_id',array('eq'=>$userId))
                            ->getFirstItem();
            $this->_redirect('vipcard/user/editaction',array('id'=>$vipCard->getId()));
        }
        return $this->_pageFactory->create();
    }
}