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
        $roomByComponent=array();
        $componentNames=array();
        foreach ($components As $component){
        	$thisRoom = $component->getRoom();
        	$componentNames[]=$component->getName();
        	$roomByComponent[$component->getName()] =$roomByComponent[$component->getName()].', '.$thisRoom->getNumber().'_'.$thisRoom->getName();
        }
        
        
        
        return array(
            'roomByComponent' => $roomByComponent,
        	'componentNames' => $componentNames
        );
    }
    
    static function getName()
    {
        return "Software";
    }
}