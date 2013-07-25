<?php

class ReportingNetwork implements Page
{
    function getTemplate()
    {
        return "reportingNetwork.tpl";
    }

    function getContent()
    {
        return array();
    }
    
    static function getName()
    {
        return "Network";
    }
}