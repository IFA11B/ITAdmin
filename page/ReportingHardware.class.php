<?php

class ReportingHardware implements Page
{
    function getTemplate()
    {
        return "reportingHardware.tpl";
    }

    function getContent()
    {
    	if(isset($_POST['save'])){
    		$this->saveNote();
    	}
    	
        $components = null;
        
        // Check if we need filtered or unfiltered component lists
        if(isset($_POST["filterType"]) && isset($_POST["filterValue"]))
        {
            $filterType = $_POST["filterType"];
            $filterValue = $_POST["filterValue"];
            
            
            $components = DataManagement::getInstance()->getHardwareComponents($filterType, $filterValue);
        }
        else
        {
            $components = DataManagement::getInstance()->getHardwareComponents();
        }
        
        $rooms =  DataManagement::getInstance()->getRooms();
        foreach ($components As $component){
        	$thisRoom = $component->getRoom();
        	$componentByRoom[$thisRoom][] = $component;
        }
        
        return array(
            'componentByRoom' => $componentByRoom,
        	'rooms' => $rooms
        );
    }
    
    static function getName()
    {
        return "Hardware";
    }
    
    function saveNote(){
    	$update = DataManagement::getInstance()->getComponentById($_POST['save']);
    	$update->setNote($_POST['Note']);
    	$update->update();
    }
}