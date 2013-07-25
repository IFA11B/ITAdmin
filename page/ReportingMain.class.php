<?php

class ReportingMain implements Page
{
    function getTemplate()
    {
        return "reportingMain.tpl";
    }
    
    function getContent()
    {
        return array(
            'pageTitle' => 'Reporting'
        );
    }
    
    static function getName()
    {
        return "Main";
    }
}