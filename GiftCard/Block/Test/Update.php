<?php
namespace Mageplaza\GiftCard\Block\Test;

class Update extends \Magento\Framework\View\Element\Template
{
//    protected $_giftCardFactory;
    public function __construct(
//        \Mageplaza\GiftCard\Model\GiftCardFactory $giftCardFactory,
        \Magento\Framework\View\Element\Template\Context $context
    )
    {
//        $this->_giftCardFactory = $giftCardFactory;
        parent::__construct($context);
    }
//    public function loadData() {
//        $id = $this->getRequest()->getParam('giftcard_id');
//        $data = $this->_giftCardFactory->create()->load($id, 'giftcard_id');
//        return $data;
//    }

}