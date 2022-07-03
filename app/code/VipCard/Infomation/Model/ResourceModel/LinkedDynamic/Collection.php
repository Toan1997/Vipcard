<?php
namespace VipCard\Infomation\Model\ResourceModel\LinkedDynamic;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {

    public function _construct(){
        $this->_init("VipCard\Infomation\Model\LinkedDynamic","VipCard\Infomation\Model\ResourceModel\LinkedDynamic");
    }
}