<?php
namespace Mageplaza\GiftCard\Controller\Adminhtml\Code;

class Edit extends \Magento\Backend\App\Action
{
    protected $_resultPageFactory;
    protected $_coreRegistry;
    protected $giftCart;

    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $registry,
        \Mageplaza\GiftCard\Model\GiftCardFactory $giftCardFactory
    )
    {
        $this->_resultPageFactory = $resultPageFactory;
        $this->giftCart = $giftCardFactory;
        $this->_coreRegistry = $registry;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $id = (int) $this->getRequest()->getParam('giftcard_id');
        $giftCard = $this->giftCart->create();
        if ($id) {
            if ($giftCard->load($id, 'giftcard_id')->getData()==null) {
                $this->messageManager->addErrorMessage(__('This page no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }
        $this->_coreRegistry->register('row_data', $giftCard->load($id));

        $resultPage->setActiveMenu('Mageplaza_GiftCard::mageplaza');
        $resultPage->getConfig()->getTitle()
            ->prepend($giftCard->load($id, 'giftcard_id')->getData() ? __('Edit Gift Card') : __('New Gift Card'));
        return $resultPage;
    }
}
