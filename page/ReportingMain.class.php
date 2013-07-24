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
            pageTitle => 'MeinTitel'
        );
    }
}