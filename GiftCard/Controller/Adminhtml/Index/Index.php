<?php
namespace Mageplaza\GiftCard\Controller\Adminhtml\Index;
use Magento\Backend\App\Action;

class Index extends Action {

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
//        $resultPage->setActiveMenu('Magento_Backend::dashboard');
//        $resultPage->addBreadcrumb(__('Dashboard'), __('Dashboard'));
        $resultPage->getConfig()->getTitle()->prepend(__('Hoang Van'));

        return $resultPage;
    }
}