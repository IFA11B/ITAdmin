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
        
        if (isset($_POST['SelectedSource']))
        {
        	$SourceComponent=DbConnector::getInstance()->getComponentById($_POST['SelectedSource']);
        	if (isset($_POST['maintainStock'])) {
        		//TODO Den Leerstring mit dem Lagerraum ersetzen.
        		$TargetRow=array(DB_COMPONENT_ROOM=>'');
        		$maintainer=new Maintencancer(null,$TargetRow,$SourceComponent,null);
        		$maintainer->Maintain();
        	}
        	elseif (isset($_POST['maintainDiscard'])) {
        		//TODO Den Leerstring mit dem Ausmusterungsraum ersetzen.
        		$TargetRow=array(DB_COMPONENT_ROOM=>'');
        		$maintainer=new Maintencancer(null,$TargetRow,$SourceComponent,null);
        		$maintainer->Maintain();
        	}
        }
        
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
