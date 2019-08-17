<?php
namespace Mageplaza\GiftCard\Observer;

class AddGiftCard implements \Magento\Framework\Event\ObserverInterface
{
    protected $helperData;
    protected $_giftCartFactory;
    protected $_giftCardHistoryFactory;
    protected $giftcardId;
    protected $permitted_chars = 'ABCDEFGHIJKLMLOPQRSTUVXYZ0123456789';
    public function __construct(
        \Mageplaza\GiftCard\Helper\Data $helperData,
        \Mageplaza\GiftCard\Model\GiftCardFactory $giftCardFactory,
        \Mageplaza\GiftCard\Model\GiftCardHistoryFactory $giftCardHistoryFactory
//        \Magento\Catalog\Model\ProductFactory $productFactory
    )
    {
        $this->helperData = $helperData;
        $this->_giftCartFactory = $giftCardFactory;
        $this->_giftCardHistoryFactory = $giftCardHistoryFactory;
    }

    function generate_string($input, $strength) {
        $input_length = strlen($input);
        $random_string = '';
        for($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    public function check($code) {
        $giftCardData = $this->_giftCartFactory->create();
        $data = $giftCardData->load($code,'code');
        if($data->getCode()!=null) {
            return false;
        }
        else {
            return true;
        }
    }
    public function insertGiftCardCode($code, $balance, $createFrom) {
        $giftCardData = $this->_giftCartFactory->create();
        if($this->check($code)==true) {
            $giftCardData->addData([
                'code' => $code,
                'balance' => $balance,
                'create_from' => $createFrom
            ])->save();
        }
        return $this->giftcardId = $giftCardData->getGiftcardId();
    }
    public function insertGiftCardHistory($giftcardId, $customerId, $amount, $action) {
        $giftCardHistory = $this->_giftCardHistoryFactory->create();
        $giftCardHistory->addData([
            'giftcard_id' => $giftcardId,
            'customer_id' => $customerId,
            'amount' => $amount,
            'action' => $action
        ])->save();
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
//        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/test.log');
//        $logger = new \Zend\Log\Logger();
//        $logger->addWriter($writer);
//        $logger->info(get_class($quote));

        /** @var \Magento\Sales\Model\Order $order */
        $order = $observer->getEvent()->getOrder();
        /** @var \Magento\Quote\Model\Quote $quote */
        $quote = $observer->getEvent()->getQuote();

        $orderId = $order->getEntityId();
        $customerId = $order->getCustomerId();
        $codeLength = $this->helperData->getGeneralConfig('code_length');

        foreach ($order->getAllItems() as $item) {
//  Get gift card amount
            $amount = $item->getProduct()->getData('gift_card_amount');
            $type = $item->getProductType();
            $productId = $item->getProductId();
            $action = "Create for Order #$productId";
//  Check condition
            if ($amount>0 and $type == 'virtual') {
                for($i=0;$i<$item->getQtyOrdered();$i++) {
                        $createFrom = '00000' . $orderId;
                        $code = $code = $this->generate_string($this->permitted_chars, $codeLength);
                        $this->insertGiftCardCode($code, $amount, $createFrom);
                        $this->insertGiftCardHistory($this->giftcardId, $customerId, $amount, $action);
                }
            }
        }

    }

}