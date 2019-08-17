<?php
//
//namespace Mageplaza\GiftCard\Controller\Customer;
//use Magento\Framework\App\Action\Action;
//
//class History extends Action
//{
//    protected $resultPageFactory;
//    public function __construct(
//        \Magento\Framework\App\Action\Context $context,
//        \Magento\Framework\View\Result\PageFactory $resultPageFactory
//    )
//    {
//        $this->resultPageFactory = $resultPageFactory;
//        parent::__construct($context);
//    }
//    public function execute()
//    {
//        $resultPage = $this->resultPageFactory->create();
//        $resultPage->getConfig()->getTitle()->prepend(__('My Gift Card'));
//        return $resultPage;
//    }
//}

namespace Mageplaza\GiftCard\Controller\Customer;
class History extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
