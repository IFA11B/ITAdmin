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
        
        if (isset($_POST['SelectedSource'])&&isset($_POST['SelectedTarget']))
        {
        	 
        	if (isset($_POST['maintain'])) {
        		$SourceComponent=DbConnector::getInstance()->getComponentById($_POST['SelectedSource']);
        		$TargetComponent=DbConnector::getInstance()->getComponentById($_POST['SelectedTarget']);
        		$maintance=new Maintencancer(null,null,$SourceComponent,$TargetComponent);
        		$maintance->Maintain();
        	}
        }
        
        //TODO if source component of all components is selected, we must filter all possible components for changing
        if(isset($_POST["sourceFilterType"]) && isset($_POST["sourceFilterType"]))
        {
            $filterType = $_POST["sourceFilterType"];
            $filterValue = $_POST["sourceFilterType"];
            
            
            $components = DataManagement::getInstance()->getHardwareComponents($filterType, $filterValue);
        }
        else
        {
            $components = DataManagement::getInstance()->getHardwareComponents();
        }
        
        if(isset($_POST["targetFilterType"]) && isset($_POST["targetFilterValue"]))
        {
        	$filterType = $_POST["targetFilterType"];
        	$filterValue = $_POST["targetFilterValue"];
        
        
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