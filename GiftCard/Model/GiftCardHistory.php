<?php
namespace Mageplaza\GiftCard\Model;

class GiftCardHistory extends \Magento\Framework\Model\AbstractModel
{
    public function _construct()
    {
        $this->_init('Mageplaza\GiftCard\Model\ResourceModel\GiftCardHistory');
    }
}