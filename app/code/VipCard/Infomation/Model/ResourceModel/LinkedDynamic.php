<?php
namespace VipCard\Infomation\Model\ResourceModel;

class LinkedDynamic extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    public function __construct(
    \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
    parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('linked_user_management', 'id');
    }

}