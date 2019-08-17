<?php
namespace Mageplaza\GiftCard\Block\Test;
class Test extends \Magento\Framework\View\Element\Template
{
    protected $_giftCardFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Mageplaza\GiftCard\Model\GiftCardFactory $giftCardFactory
    )
    {
        $this->_giftCardFactory = $giftCardFactory;
        parent::__construct($context);
    }
    public function getPostCollection(){
        $giftCard = $this->_giftCardFactory->create();
        return $giftCard->getCollection();
    }

}