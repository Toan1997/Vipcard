<?php

namespace VipCard\Infomation\Controller\Adminhtml\User;

use Magento\Framework\Controller\ResultFactory;
class Uploader extends \Magento\Backend\App\Action {
    /**
     * Image uploader
     *
     * @var \Magento\Catalog\Model\ImageUploader
     */
    protected $imageUploader;

    /**
     * Upload constructor.
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Catalog\Model\ImageUploader $imageUploader
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Catalog\Model\ImageUploader $imageUploader,
        \Magento\Framework\Session\SessionManagerInterface $coreSession
    ) {
        parent::__construct($context);
        $this->imageUploader = $imageUploader;
        $this->coreSession = $coreSession;
    }

    /**
     * Upload file controller action.
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute() {
        $imageUploadId = $this->_request->getParam('param_name', 'avatar');
        try {
            $imageResult = $this->imageUploader->saveFileToTmpDir($imageUploadId);
            $imageResult['cookie'] = [
                'name' => $this->_getSession()->getName(),
                'value' => $this->_getSession()->getSessionId(),
                'lifetime' => $this->_getSession()->getCookieLifetime(),
                'path' => $this->_getSession()->getCookiePath(),
                'domain' => $this->_getSession()->getCookieDomain(),
            ];
            $this->coreSession->start();
            $this->coreSession->setLinkImg($imageResult['file']);
        } catch (\Exception $e) {
            $imageResult = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
        }
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($imageResult);
    }
}