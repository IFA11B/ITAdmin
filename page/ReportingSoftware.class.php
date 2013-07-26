<?php

class ReportingSoftware implements Page
{
    function getTemplate()
    {
        return "reportingSoftware.tpl";
    }

    function getContent()
    {
        $components = null;

        // Check if we need filtered or unfiltered component lists
        if(isset($_POST["filterType"]) && isset($_POST["filterValue"]))
        {
            $filterType = $_POST["filterType"];
            $filterValue = $_POST["filterValue"];


            $components = DataManagement::getInstance()->getSoftwareComponents($filterType, $filterValue);
        }
        else
        {
            $components = DataManagement::getInstance()->getSoftwareComponents();
        }

        return array(
                'components' => $components
        );
    }
    
    static function getName()
    {
        return "Software";
    }
}