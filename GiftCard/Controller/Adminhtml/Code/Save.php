<?php
namespace Mageplaza\GiftCard\Controller\Adminhtml\Code;
use Magento\Framework\App\Action\Action;
use Magento\Setup\Exception;

class Save extends Action
{
    protected $giftCart;
    protected $permitted_chars = 'ABCDEFGHIJKLMLOPQRSTUVXYZ0123456789';
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Mageplaza\GiftCard\Model\GiftCardFactory $giftCardFactory
    )
    {
        $this->giftCart = $giftCardFactory;
        parent::__construct($context);
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
        $giftCard = $this->giftCart->create();
        $data = $giftCard->load($code,'code')->getData();
        if($data!=null) {
            return false;
        }
        else {
            return true;
        }
    }
    public function execute () {
        $data = $this->getRequest()->getPostValue();
//        echo "<pre>";
//        var_dump($data);
//        echo "</pre>";
//        die();
        $id = $this->getRequest()->getParam('giftcard_id');
        $rowData = $this->giftCart->create();
        $dataCheck = $rowData->load($id)->getData();
        if($id!=null) {

            if($dataCheck!=null) {
                $rowData->load($data['giftcard_id']);
                $rowData->setData($data);
                $rowData->save();
                $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
                $this->_redirect('*/*/');
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['giftcard_id' => $rowData->getGiftcardId()]);
                    return;
                }
            }
            else {
                $this->messageManager->addError(__("Code doesn't exist in database! Save fail"));
                $this->_redirect('*/*/');
            }
        }
        else {
            $codeLength = $data['code_length'];
            $balance = $data['balance'];
            $code = $this->generate_string($this->permitted_chars, $codeLength);
            if($this->check($code)==true) {
                $rowData->addData([
                    'code' => $code,
                    'balance' => $balance
                ])->save();
                $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', ['giftcard_id' => $rowData->getGiftcardId()]);
                    return;
                }

                $this->_redirect('*/*/');
            }
            else {
                $this->messageManager->addError(__('Code existed in database! Please type another Code'));
            }

        }

    }
}