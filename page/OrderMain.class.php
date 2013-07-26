<?php

class OrderMain implements Page
{
    function getTemplate()
    {
        return "orderMain.tpl";
    }
    
    function getContent()
    {
        return array(
            'pageTitle' => 'Bestellung'
        );
    }
    
    static function getName()
    {
        return "Main";
    }
}