<?php
namespace Mageplaza\GiftCard\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action
{
//    protected $giftCart;
    protected $_pageFactory;
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
//        \Mageplaza\GiftCard\Model\GiftCardFactory $giftCardFactory,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
//        $this->giftCart = $giftCardFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $module = $this->getRequest()->getParam('module');
        if($module=='addgc') {

        }
        else if($module=='updategc') {
            $giftCardId = $this->getRequest()->getParam('giftcard_id');
            echo $giftCardId;
            exit();
        }
        else {
            $giftCardId = $this->getRequest()->getParam('giftcard_id');
            echo $giftCardId;
            echo "xoa";
            exit();
        }



        return $this->_pageFactory->create();
//        $this->insertData();
//        $this->updateData(15);
//        $this->deleteData(2);
    }
    public function check($code) {
        $giftCard = $this->giftCart->create();
        $data = $giftCard->load($code,'code')->getData();
        if($data!=null) {
            return false;
        }
        else {
            return true;
        }
    }
    public function insertData() {
        $giftCard = $this->giftCart->create();
        $giftCard->addData([
            'code' => '12adjkgghj6555',
            'balance' => 10002.0001,
            'amount_used' => 100.0002,
            'create_from' => 'Admin'
        ]);
        if($this->check($giftCard->getCode())==false) {
            echo "Insert data fail!";
            exit();
        }
        else {
            $giftCard->addData([
                'code' => $giftCard->getCode(),
                'balance' => $giftCard->getBalance(),
                'amount_used' => $giftCard->getAmount_used(),
                'create_from' => $giftCard->getCreate_from()
            ])->save();
            echo "Insert data success!";
            exit();
        }
    }
    public function updateData($id) {
        $giftCard = $this->giftCart->create();
        $data = $giftCard->load($id, 'giftcard_id');
        if($data->getData()==null) {
            echo "Don't exist record has id = $id";
            exit();
        }
        else {
            echo "Before update: <br>";
            echo "<pre>";
            print_r($data->getData());
            echo "</pre>";
            $codeCheck = '12345rrr67abcd';
            if($this->check($codeCheck)==false) {
                echo "Update fail!";
                exit();
            }
            else {
                $data->setCode($codeCheck)->save();
                $data->setBalance(500005.0005)->save();
                $data->setAmount_used(3000.2000)->save();
                echo "<br>Update Data Success!<br>";
                echo "<br>After update: <br>";
                echo "<pre>";
                print_r($data->getData());
                echo "</pre>";
                exit();
            }
        }
    }
    public function deleteData($id) {
        $giftCard = $this->giftCart->create();
        $data = $giftCard->load($id, 'giftcard_id');
        if($data->getData()==null) {
            echo "Don't exist record has id = $id";
            exit();
        }
        else {
            $data->delete();
            echo "Delete Data Success!";
            exit();
        }
    }
}
