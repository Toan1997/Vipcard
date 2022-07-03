<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace  VipCard\Infomation\Ui\Component\Form;

class AffiliateOptions implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var null|array
     */
    protected $options;

    public function __construct(
        \VipCard\Infomation\Model\ResourceModel\AffiliateIcon\CollectionFactory $affiliateIconCollectionFactory
    ) {
        $this->affiliateIconCollectionFactory = $affiliateIconCollectionFactory;
    }

    /**
     * @return array|null
     */
    public function toOptionArray()
    {
        $affiliateIcons =  $this->affiliateIconCollectionFactory->create();
        foreach($affiliateIcons as $affiliateIcon){
            $options[] =  ['label' => __($affiliateIcon->getNameAffiliate()), 'value' => $affiliateIcon->getId()];
        }
        return $options;
    }
}
