<?php
class MaintenanceRemove implements Page
{
	function getTemplate()
	{
		return 'maintenanceRemove.tpl';
	}

	function getContent()
	{
        $components = null;
        
        //TODO Add constant filter to room! Must exclude stocking and discarding room
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
		return 'Ausbau';
	}
}
?>
