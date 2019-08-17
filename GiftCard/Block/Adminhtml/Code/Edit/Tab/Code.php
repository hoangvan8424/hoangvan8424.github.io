<?php
namespace Mageplaza\GiftCard\Block\Adminhtml\Code\Edit\Tab;

class Code extends \Magento\Backend\Block\Widget\Form\Generic implements \Magento\Backend\Block\Widget\Tab\TabInterface
{
    protected $helperData;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Mageplaza\GiftCard\Helper\Data $helperData,
        array $data = []
    )
    {
        $this->helperData = $helperData;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create();
        $this->setForm($form);
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Gift Card Information')]
        );
        $id = $this->getRequest()->getParam('giftcard_id');
        if ($model->getGiftcardId()!=null) {
            $fieldset->addField(
                'giftcard_id',
                'hidden',
                [
                    'name' => 'giftcard_id',
                    'label' => __("ID")
                ]
            );
        }
        if($id==null) {
            $codeLength = $this->helperData->getGeneralConfig('code_length');
            $fieldset->addField(
                'code_length',
                'text',
                [
                    'name'        => 'code_length',
                    'label'    => __('Code Length'),
                    'required'     => false
                ]
            );
            $fieldset->addField(
                'balance',
                'text',
                [
                    'name'        => 'balance',
                    'label'    => __('Balance'),
                    'required'     => true
                ]
            );
            $data=array('code_length'=>$codeLength);
            $form->setValues($data);
        }
        else {
            $fieldset->addField(
                'code',
                'text',
                [
                    'name'        => 'code',
                    'label'    => __('Code'),
                    'required'     => false,
                    'disabled'   => true
                ]
            );
            $fieldset->addField(
                'balance',
                'text',
                [
                    'name'        => 'balance',
                    'label'    => __('Balance'),
                    'required'     => true
                ]
            );
            $fieldset->addField(
                'create_from',
                'text',
                [
                    'name'        => 'create_from',
                    'label'    => __('Create From'),
                    'required'     => true,
                    'disabled'   => true
                ]
            );
            $data = $model->getData();
            $form->setValues($data);
        }


        $this->setForm($form);
        return parent::_prepareForm();
    }
    public function getTabLabel()
    {
        return __('Gift card information');
    }

    public function getTabTitle()
    {
        return $this->getTabLabel();
    }

    public function canShowTab()
    {
        return true;
    }

    public function isHidden()
    {
        return false;
    }
}

