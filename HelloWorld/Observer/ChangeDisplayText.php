<?php

namespace Mageplaza\HelloWorld\Observer;

class ChangeDisplayText implements \Magento\Framework\Event\ObserverInterface
{
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $displayText = $observer->getData('mp_text');

        echo "<pre>";
        print_r($displayText);
        echo "</pre>";
        echo $displayText->getAaa() ." ". $displayText->getBbb()." ". $displayText->getCcc()."</br>";

        $displayText->setBbb('^ _ ^');
        echo "<pre>";
        print_r($displayText);
        echo "</pre>";
        echo $displayText->getAaa() ." ". $displayText->getBbb()." ". $displayText->getCcc()."</br>";
        return $this;

    }
}