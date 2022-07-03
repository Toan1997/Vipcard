<?php
namespace VipCard\Infomation\Model\ResourceModel\AffiliateIcon;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {

    public function _construct(){
        $this->_init("VipCard\Infomation\Model\AffiliateIcon","VipCard\Infomation\Model\ResourceModel\AffiliateIcon");
    }
}