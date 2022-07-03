<?php

namespace VipCard\Infomation\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Magento\Framework\Controller\ResultFactory;

class Actions extends Column
{
    protected $urlBuilder;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        \Magento\Backend\Model\Auth\Session $authSession,
        \Magento\Framework\Controller\ResultFactory $resultFactory,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->authSession = $authSession;
        $this->resultFactory = $resultFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $storeId = $this->context->getFilterParam('store_id');
            foreach ($dataSource['data']['items'] as &$item) {
                $item[$this->getData('name')]['edit'] = [
                    'href' => $this->urlBuilder->getUrl(
                        'vipcard/user/editaction',
                        ['id' => $item['user_id'], 'store' => $storeId]
                    ),
                    'label' => __('Edit'),
                    'hidden' => false,
                ];
                $item[$this->getData('name')]['delete'] = [
                    'href' => $this->urlBuilder->getUrl(
                        'vipcard/user/deleteaction',
                        ['id' => $item['user_id'], 'store' => $storeId]
                    ),
                    'label' => __('Delete'),
                    'hidden' => false,
                ];
            }
        }

        return $dataSource;
    }
    public function getCurrentUser()
    {
        return $this->authSession->getUser();
    }
}
