<?php

class ReportingHardware implements Page
{
    function getTemplate()
    {
        return "reportingHardware.tpl";
    }

    function getContent()
    {
        $components = null;
        
        // Check if we need filtered or unfiltered component lists
        if(isset($_POST["filterType"]) && isset($_POST["filterValue"]))
        {
            $filterType = $_POST["filterType"];
            $filterValue = $_POST["filterValue"];
            
            
            $components = DataManagement::getInstance()->getComponents($filterType, $filterValue);
        }
        else
        {
            $components = DataManagement::getInstance()->getComponents();
        }
        
        return array(
            'components' => $components
        );
    }
    
    static function getName()
    {
        return "Hardware";
    }
}