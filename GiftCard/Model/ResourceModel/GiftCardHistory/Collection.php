<?php
namespace Mageplaza\GiftCard\Model\ResourceModel\GiftCardHistory;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            'Mageplaza\GiftCard\Model\GiftCardHistory',
            'Mageplaza\GiftCard\Model\ResourceModel\GiftCardHistory'
        );
    }
}