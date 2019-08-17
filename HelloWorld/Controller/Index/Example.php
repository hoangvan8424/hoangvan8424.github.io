<?php

namespace Mageplaza\HelloWorld\Controller\Index;

use Magento\Framework\DataObject;

class Example extends \Magento\Framework\App\Action\Action
{

    protected $title;


    public function execute()
    {
        $this->setTitle('Welcome');
        echo $this->getTitle();

        echo $this->getMessage("Hoang Van", true);


    }

    public function setTitle($title)
    {
        echo __METHOD__ . "</br>";
        return $this->title = $title;
    }

    public function getTitle()
    {
        echo __METHOD__ . "</br>";
        return $this->title;

    }



    public function getMessage($text='world', $check=false) {
        echo  __METHOD__ . "<br>";
        $string = 'Hello ' . $text . '!';
        if($check==true) {
            $string = strtoupper($string);
        }
        else {
            $string = strtolower($string);
        }

        return $string;
    }


}
