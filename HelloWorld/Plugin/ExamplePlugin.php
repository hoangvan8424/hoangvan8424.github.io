<?php

namespace Mageplaza\HelloWorld\Plugin;

use Mageplaza\HelloWorld\Controller\Index\Example;

class ExamplePlugin
{

    public function beforeSetTitle(\Mageplaza\HelloWorld\Controller\Index\Example $subject, $title)
    {

        $title = $title . " to ";
        echo __METHOD__ . "</br>";
        echo "<b>before setTitle = $title</b><br>";
        return [$title];


    }

    public function afterGetTitle(\Mageplaza\HelloWorld\Controller\Index\Example $subject, $result)
    {

        echo __METHOD__ . "</br>";
        echo "<b>after getTitle = $result</b><br>";
        return '<h1>' . $result . 'Mageplaza.com' . '</h1>';


    }

    public function aroundGetTitle(\Mageplaza\HelloWorld\Controller\Index\Example $subject, callable $proceed)
    {
        echo __METHOD__ . " - Before proceed() </br>";
        $result = $proceed();
        echo "<b>around - before proceed = </b>" .$result."<br>";
        echo __METHOD__ . " - After proceed() </br>";
        echo "<b>around - after proceed = </b>" .$result."<br>";
        return $result;

    }


    public function beforeGetMessage(Example $subject, $text='world', $check=false) {
        echo  __METHOD__ . "<br>";
        return ['Changing the argument', $check];
    }

    public function afterGetMessage(Example $subject, $result) {
        echo  __METHOD__. "<br>";
        $result = '<h3>'. $result . ' Something appending here. Hear from you.' . '</h3>';
        return $result;
    }

    public function aroundGetMessage(Example $subject, callable $proceed, $text, $check) {
        echo  __METHOD__ . ' -- before' ."<br>";
        $text = "Thai";
        $check = true;
        $result = $proceed($text,$check);
        echo  __METHOD__ . ' -- after' . "<br>";
        return $result;
    }


}