<?php
namespace VipCard\ConnectApi\Model;
use VipCard\ConnectApi\Api\UserInterface;
class User implements UserInterface
{
    /**
     * Returns greeting message to user
     *
     * @api
     * @param string $nameId Users id.
     * @return string Greeting message with users name.
     */
    public function user($nameId) {

        $user = $this->getUser($nameId);
        $linkedDynamics = $this->getLinkedDynamic($user->getId());
        $dynamics = array();
        $isUser = $user->getId();
       //echo "<pre>";print_r(111);exit;
        if($isUser){
            $dynamicsJson = json_encode($linkedDynamics);
            $param = array(
                'isUser' => true,
                'link_avatar' => $user->getLinkAvatar(),
                'name'=> $user->getName(),
                'greeting' => $user->getGreeting(),
                'affiliate' => $dynamicsJson,
                'sdt' => $user->getSdt()
            );
        }else{
            $param = array('isUser' => false);
        }

        return json_encode($param);

    }

    protected function getUser($nameId){
        $objectManager = $this->objectManager();
        $vipCardFactory =  $objectManager->create('VipCard\Infomation\Model\VipCard')->load($nameId,'link_user');
        return $vipCardFactory;
    }

    protected function getLinkedDynamic($userId){


        $objectManager = $this->objectManager();
        $linkedDynamicCollection =  $objectManager->create('VipCard\Infomation\Model\LinkedDynamic')->getCollection();
        $linkedDynamicCollection->addFieldToFilter('user_id', ['eq' => $userId]);
        $linkedDynamicCollection->getSelect()->joinLeft(
            ['linked'=>$linkedDynamicCollection->getTable('vipcard_affiliate_templates')],
            'main_table.icon_id = linked.id');

        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $select = $linkedDynamicCollection->getSelect();
        return $connection->fetchAll($select);
    }

    protected function objectManager(){
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        return $objectManager;
    }
}