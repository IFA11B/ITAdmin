<?php

class ReportingSoftware implements Page
{
    function getTemplate()
    {
        return "reportingSoftware.tpl";
    }

    function getContent()
    {
        return array();
    }
    
    static function getName()
    {
        return "Software";
    }
}