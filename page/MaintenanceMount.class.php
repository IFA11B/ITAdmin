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
        
        if (isset($_POST['SelectedSource'])&&isset($_POST['SelectedTarget']))
        {
        	
        	if (isset($_POST['maintain'])) {
        		$SourceComponent=DbConnector::getInstance()->getComponentById($_POST['SelectedSource']);
        		$TargetComponent=DbConnector::getInstance()->getComponentById($_POST['SelectedTarget']);
        		$maintance=new Maintencancer(null,null,$SourceComponent,$TargetComponent);
        		$maintance->Maintain();
        	}
        }
        
        // TODO Add constant filter to room. Only stocking and discarding room is allowed!
        // if source selected, then we have to include all parents which are possible get this child
        if(isset($_POST["sourceFilterType"]) && isset($_POST["sourceFilterValue"]))
        {
            $filterType = $_POST["sourceFilterType"];
            $filterValue = $_POST["sourceFilterValue"];
            
            
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
		return 'Einbau';
	}
}
?>
