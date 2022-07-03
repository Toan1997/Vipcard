<?php

namespace VipCard\Infomation\Controller\Adminhtml\User;
class Save extends \VipCard\Infomation\Controller\Adminhtml\VipCard
{
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $params = $this->getRequest()->getPostValue();
        //echo "<pre>";print_r($params);exit;
        if($params)
        {
            try{
                if($params['user_id']){
                    $model = $this->vipCardFactory->create()->load($params['user_id']);
                }else{
                    $model = $this->vipCardFactory->create();
                }
                $linkAvatar = $this->coreSession->getLinkImg();
                $model->addData([
                    'link_user' => $params['link_user'],
                    'link_avatar' => $linkAvatar,
                    'name'=> $params['name'],
                    'greeting' => $params['greeting'],
                    'sdt' => $params['sdt'],
                ])->save();
                if(isset($params['vipcard_dynamic_row'])){
                    //echo "<pre>";print_r($params['vipcard_dynamic_row']);exit;
                    $linkedDynamicCollection = $this->linkedDynamicFactory->create()->getCollection();
                    $linkedDynamic = $linkedDynamicCollection->addFieldToFilter('user_id',array('eq'=>$model->getId()));
                    if($linkedDynamic->getSize()){
                        $linkedDynamic->walk('delete');
                    }
                    foreach($params['vipcard_dynamic_row'] as $dynamicData){
                        $linkedDynamic = $this->linkedDynamicFactory->create();
                        $linkedDynamic->addData([
                            'user_id' =>$model->getId(),
                            'icon_id' => $dynamicData['icon_id'],
                            'affiliate' => $dynamicData['affiliate'],
                            'record_id' => $dynamicData['record_id'],
                        ])->save();
                    }
                }
                $this->messageManager->addSuccess(__('Successfully saved the item.'));
            }
            catch(\Exception $e)
            {
                $this->messageManager->addError($e->getMessage());
            }
        }
        return $resultRedirect->setPath('*/*/index');
    }
}