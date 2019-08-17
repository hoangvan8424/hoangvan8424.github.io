<?php
namespace Mageplaza\GiftCard\Observer;
use Magento\Framework\Event\Observer;

class ApplyGiftCard implements \Magento\Framework\Event\ObserverInterface
{
    protected $_giftCardFactory;
    protected $_messageManager;
    protected $_session;
    /**
     * @var \Magento\Framework\App\Response\RedirectInterface
     */
    protected $_redirect;

    /**
     * @var \Magento\Framework\App\ActionFlag
     */
    protected $_actionFlag;
    protected $amount;
    public function __construct
    (
        \Mageplaza\GiftCard\Model\GiftCardFactory $giftCardFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Magento\Framework\App\Response\RedirectInterface $redirect,
        \Magento\Framework\App\ActionFlag $actionFlag
    )
    {
        $this->_giftCardFactory = $giftCardFactory;
        $this->_messageManager = $messageManager;
        $this->_redirect = $redirect;
        $this->_actionFlag = $actionFlag;
    }
    public function checkCode($code) {
        $giftCard = $this->_giftCardFactory->create();
        $data = $giftCard->load($code, 'code');
        if($data->getCode()!=null) {
            if($data->getAmountUsed()==0) {
                $this->amount = $data->getBalance();
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }

    }
    public function execute(Observer $observer)
    {
        $controller = $observer->getControllerAction();
        $remove = $controller->getRequest()->getParam('remove');
        if($remove==0) {
            $couponCode = $controller->getRequest()->getParam('coupon_code');
            if($this->checkCode($couponCode)==true) {
                $this->_messageManager->addSuccess(__('Gift code applied successfully.'));
                if(!isset($_SESSION['giftcard'])) {
                    $_SESSION['giftcard'] = array(
                        'couponCode' => $couponCode,
                        'remove' => $remove
                    );
                }
                $this->_actionFlag->set('', \Magento\Framework\App\Action\Action::FLAG_NO_DISPATCH, true);
                $this->_redirect->redirect($controller->getResponse(),'checkout/cart');
            }
            else {
                $this->_redirect->redirect($controller->getResponse(),'checkout/cart/index/couponPost');
            }
        }
        else {
            unset($_SESSION['giftcard']);
            $this->_messageManager->addSuccess(__('You canceled the coupon code.'));
        }
    }
}