<?php

class ReportingNetwork implements Page
{
    function getTemplate()
    {
        return "reportingNetwork.tpl";
    }

    function getContent()
    {
        $components = null;

        // Check if we need filtered or unfiltered component lists
        if(isset($_POST["filterType"]) && isset($_POST["filterValue"]))
        {
            $filterType = $_POST["filterType"];
            $filterValue = $_POST["filterValue"];


            $components = DataManagement::getInstance()->getNetworkComponents($filterType, $filterValue);
        }
        else
        {
            $components = DataManagement::getInstance()->getNetworkComponents();
        }
        return array(
                'components' => $components
        );
    }
    
    static function getName()
    {
        return "Network";
    }
}