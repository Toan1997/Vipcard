<?php
namespace VipCard\Infomation\Model\ResourceModel;

class VipCard extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
    \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
    parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('vipcard_user_management', 'user_id');
    }

}