<?php

namespace Mageplaza\GiftCard\Controller\Customer;

use Magento\Customer\Model\CustomerFactory;

class Redeem extends \Magento\Framework\App\Action\Action
{
    protected $_giftCartFactory;
    protected $_giftCardHistoryFactory;
    protected $_customerFactory;
    protected $id;
    protected $_resource;
    protected $giftcardBalance;
    protected $giftcardID;
    protected $balance=0;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Mageplaza\GiftCard\Model\GiftCardFactory $giftCardFactory,
        \Mageplaza\GiftCard\Model\GiftCardHistoryFactory $giftCardHistoryFactory,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Framework\App\ResourceConnection $resource
    )
    {
        $this->_giftCartFactory = $giftCardFactory;
        $this->_giftCardHistoryFactory = $giftCardHistoryFactory;
        $this->_customerFactory = $customerFactory;
        $this->_resource = $resource;
        parent::__construct($context);
    }
    public function check($code) {
        $giftCard = $this->_giftCartFactory->create();
        $data = $giftCard->load($code,'code');
        if($data->getCode()!=null) {
            if($data->getAmountUsed() == 0) {
                $this->giftcardBalance = $data->getBalance();
                $this->giftcardID = $data->getGiftcardId();
                return true;
            }

            else return false;
        }
        else {
            return false;
        }
    }

    public function execute()
    {
        $data = $this->getRequest()->getParams();
        $code = $data['code'];
        $getBlock = $this->_objectManager->get("Mageplaza\GiftCard\Block\Customer\History");
        $customerId = $getBlock->getCustomerID();
        $giftcardData = $getBlock->getJoinData($customerId);
        foreach ($giftcardData as $_giftcardData):
            $this->balance = $_giftcardData['giftcard_balance'];
        endforeach;

        if($this->check($code)==true) {
            $this->updateGiftCard($this->giftcardID, $this->giftcardBalance);
            $this->insertGiftCardHistory($this->giftcardID, $customerId, $this->giftcardBalance);

            $balanceCustomer = $this->balance + $this->giftcardBalance;
            $this->updateBalance($customerId, $balanceCustomer);

            $this->messageManager->addSuccess(__('You redeemed successfully.'));
            $this->_redirect('*/customer/history');
        }
        else {
            $this->messageManager->addSuccess(__('You redeemed fail.'));
            $this->_redirect('*/customer/history');
        }
    }
    public function updateGiftCard($id, $amountUse) {
        $giftCard = $this->_giftCartFactory->create();
        $data = $giftCard->load($id,'giftcard_id');
        $data->setAmountUsed($amountUse)->save();
    }
    public function insertGiftCardHistory($giftcardID, $customerID, $balanceGiftCard) {
        $giftCardHistory = $this->_giftCardHistoryFactory->create();
        $giftCardHistory->addData([
            'giftcard_id' => $giftcardID,
            'customer_id' => $customerID,
            'amount' => $balanceGiftCard,
            'action' => 'Redeem'
        ])->save();
    }
    public function updateBalance($customerID, $balanceCustomer) {
//        $customer = $this->_customerFactory->create();
//        $customerData = $customer->load($customerID, 'entity_id');
//        $customerData->setData('giftcard_balance', $balanceCustomer);
//        $customerData->save();
        $connection = $this->_resource->getConnection();
        $table = $this->_resource->getTableName('customer_entity');
        $sql = "UPDATE $table SET giftcard_balance = $balanceCustomer WHERE entity_id = $customerID";
        $connection->query($sql);
    }

}