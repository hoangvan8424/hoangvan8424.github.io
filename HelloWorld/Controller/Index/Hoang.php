<?php
namespace Mageplaza\HelloWorld\Controller\Index;
use Magento\Framework\App\Action\Action;

class Hoang extends Action
{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        echo "Hello Thai. I love you ^_^";
        exit();
    }
}











