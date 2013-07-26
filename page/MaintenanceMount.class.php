<?php
class MaintenanceMount implements Page
{
	function getTemplate()
	{
		return 'maintenanceMount.tpl';
	}

	function getContent()
	{
        $components = null;
        
        // TODO Add constant filter to room. Only stocking and discarding room is allowed!
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
		return 'Einbau';
	}
}
?>
