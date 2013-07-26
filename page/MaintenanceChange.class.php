<?php
class MaintenanceChange implements Page
{
	function getTemplate()
	{
		return 'maintenanceChange.tpl';
	}

	function getContent()
	{
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
        
        return array(
            'components' => $components
        );
	}

	static function getName()
	{
		return 'Austausch';
	}
}
?>