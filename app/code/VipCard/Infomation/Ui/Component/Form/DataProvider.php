<?php

namespace VipCard\Infomation\Ui\Component\Form;

use VipCard\Infomation\Model\ResourceModel\VipCard\CollectionFactory;
use VipCard\Infomation\Model\ResourceModel\LinkedDynamic\CollectionFactory as linkedCollectionFactory;
use \Magento\Store\Model\StoreManagerInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $vipcardCollectionFactory,
        linkedCollectionFactory $linkedCollectionFactory,
        StoreManagerInterface $storeManager,
        \Magento\Backend\Model\Auth\Session $authSession,
        \Magento\Framework\App\Request\Http $request,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $vipcardCollectionFactory->create();
        $this->linkedCollectionFactory = $linkedCollectionFactory->create();
        $this->storeManager = $storeManager;
        $this->authSession = $authSession;
        $this->request = $request;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $adminId = $this->getCurrentUser()->getId();
        $items = $this->collection->getItems();
        $id = $this->request->getParam('id');
        $vipCard =  $this->collection
                ->addFieldToFilter('user_id',array('eq'=> $id))
                ->getFirstItem();
        if($adminId != 9){
            if($adminId != $vipCard->getAdminId()){
                echo "Không có quyền truy cập";exit;
            }
        }
        foreach ($items as $item) {
            $this->_loadedData[$item->getId()] = $item->getData();
            $linkedDynamic = $this->linkedCollectionFactory->addFieldToFilter('user_id',array('eq'=>$item->getId()))->setOrder('record_id','ASC');;
            $this->_loadedData[$item->getId()]['vipcard_dynamic_row'] = $linkedDynamic->getData();
            if ($item->getLinkAvatar()) {
                $m['link_avatar'][0]['name'] = '';
                $m['link_avatar'][0]['url'] = $this->getMediaUrl().$item->getLinkAvatar();
                $fullData = $this->_loadedData;
                $this->_loadedData[$item->getId()] = array_merge($fullData[$item->getId()], $m);
            }
        }
        return $this->_loadedData;
    }
    public function getMediaUrl()
    {
        $mediaUrl = $this->storeManager->getStore()
                ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA).'avatar/tmp/image/';
        return $mediaUrl;
    }
    public function getCurrentUser()
    {
        return $this->authSession->getUser();
    }

}