<?php

class ReportingHardware implements Page
{
    function getTemplate()
    {
        return "reportingHardware.tpl";
    }

    function getContent()
    {
        return array();
    }
    
    static function getName()
    {
        return "Hardware";
    }
}