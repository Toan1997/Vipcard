<?php
namespace VipCard\Infomation\Model\ResourceModel\VipCard;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {

    public function _construct(){
        $this->_init("VipCard\Infomation\Model\VipCard","VipCard\Infomation\Model\ResourceModel\VipCard");
    }
}