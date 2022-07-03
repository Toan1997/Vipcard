<?php
/**
 * Commercers Vietnam
 *  Toan Dao 
 */
namespace VipCard\Infomation\Model;

class VipCard extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('VipCard\Infomation\Model\ResourceModel\VipCard');
    }
}
