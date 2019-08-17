<?php
//namespace Mageplaza\HelloWorld\Controller\Index;
//
//class Test extends \Magento\Framework\App\Action\Action
//{
//    protected $_pageFactory;
//
//    public function __construct(
//        \Magento\Framework\App\Action\Context $context,
//        \Magento\Framework\View\Result\PageFactory $pageFactory)
//    {
//        $this->_pageFactory = $pageFactory;
//        return parent::__construct($context);
//    }
//
//    public function execute()
//    {
//        echo "Hello World";
//        exit;
//    }
//}


namespace Mageplaza\HelloWorld\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action
{

    public function execute()
    {
        $textDisplay = new \Magento\Framework\DataObject(array('aaa' => 'Hoàng', 'bbb' => 'Văn', 'ccc' => 'Thái'));
        $this->_eventManager->dispatch('mageplaza_helloworld_display_text', ['mp_text' => $textDisplay]);
        echo $textDisplay->getText();
        exit;
    }
}