<?php
namespace Mageplaza\GiftCard\Block\Customer;
use Magento\Framework\Pricing\PriceCurrencyInterface;
class History extends \Magento\Framework\View\Element\Template
{
    protected $_template = 'Mageplaza_GiftCard::history.phtml';
    protected $_giftCardFactory;
    protected $_customerSession;
    protected $customerID;
    protected $_resource;
    protected $_priceCurrency;
    protected $_helperData;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Mageplaza\GiftCard\Model\GiftCardFactory $giftCardFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\App\ResourceConnection $resource,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Mageplaza\GiftCard\Helper\Data $helperData,
        array $data = []
    ) {
        $this->_giftCardFactory = $giftCardFactory;
        parent::__construct($context, $data);
        //get collection of data
        $collection = $this->_giftCardFactory->create()->getCollection();
        $this->setCollection($collection);
        $this->_customerSession = $customerSession;
        $this->_resource = $resource;
        $this->_priceCurrency = $priceCurrency;
        $this->_helperData = $helperData;
        $this->pageConfig->getTitle()->set(__('My Gift Card'));
    }

    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($this->getCollection()) {
            // create pager block for collection
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'mageplaza.giftcard.history.pager'
            )->setCollection(
                $this->getCollection() // assign collection to pager
            );
            $this->setChild('pager', $pager);// set pager block in layout
        }
        return $this;
    }
    public function getJoinData($customerID){
        $collection = $this->_giftCardFactory->create()->getCollection();
        $second_table_name = $this->_resource->getTableName('giftcard_history');
        $third_table_name = $this->_resource->getTableName('customer_entity');
        $sql = $collection->getSelect()
            ->join(
                array('second' => $second_table_name),
                'main_table.giftcard_id = second.giftcard_id'
            )->join(
                ['third'=>$third_table_name],
                'second.customer_id = third.entity_id'
            )->where("second.customer_id = $customerID");

        $connection = $this->_resource->getConnection();
        $result = $connection->fetchAll($sql->__toString());
        return $result;
    }
    public function getRedeemValue() {
        return $this->_helperData->getGeneralAllowRedeem('allow_redeem');
    }
    public function getCustomerID()
    {
        return $this->customerID = $this->_customerSession->getCustomerId();
    }
    public function getFormatedPrice($amount)
    {
        return $this->_priceCurrency->convertAndFormat($amount);
    }

    // method for get pager html
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }

}