<?php

class CoreDataManagement implements Page
{
    function getTemplate()
    {
        return "coreDataManagement.tpl";
    }
    
    function getContent()
    {
        return array(
            'pageTitle' => 'Stammdatenverwaltung'
        );
    }
    
    static function getName()
    {
        return "Main";
    }
}