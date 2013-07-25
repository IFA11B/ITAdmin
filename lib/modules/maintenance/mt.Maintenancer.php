<?php
class Maintencancer
{
	const MODULE_NAME = "MAINTENANCE";
	const MODULE_TITLE = "Maintenance";
	
	private $SourceComponent;
	private $TargetComponent;
	
	public function __construct(array $SourceComponent,array $TargetComponent)
	{
		$this->SourceComponent=$SourceComponent;
		$this->TargetComponent=$TargetComponent;
	}
	
	public function getId()
	{
		return DbConnector::getInstance()->getModuleId(MODULE_NAME);
	}
	
	public function getName()
	{
		return MODULE_NAME;
	}
	
	public function getTitle()
	{
		return MODULE_TITLE;
	}
	
	public function getDescription()
	{
		// TODO change module description
		return "Daten werden angezeigt.";
	}
	
	public function getPage(string $page)
	{
		$pageObject = null;
	
		switch ($page)
		{
			case "Detail":
				$pageObject = new Detail();
				break;
	
			case "Main":
			default:
				$pageObject = new MaintenanceMain();
				break;
		}
	
		return $pageObject;
	}
	
	public function Mantain()
	{
		if ($this->MountComponent($idRoom)->getComponentType()==$this->NewComponent->getComponentType()) {
			Changing();
		}
		else
		{
			if ($this->IsSpecialRoom($this->SourceComponent)) {
				;
			}
			
		}	
	}
	
	private function IsSubComponent()
	{
		
	}
	private static function IsSpecialRoom($component)
	{
		if ($this->IsStockRoom($component)) {
			return true;
		}
		elseif ($this->IsDiscardRoom($component)){
			return true;
		}
		return false;
	}
	private static function IsStockRoom($component)
	{
		if ($component->Room==MaintenanceCommonHelper::GetStockRoomId()) {
			return true;
		}
		return false;
	}
	
	private static function IsDiscardRoom()
	{
		if ($component->Room==MaintenanceCommonHelper::GetDiscardRoomId()) {
			return true;
		}
		return false;
	}
	
	public function Changing()
	{
		
	}
	
	public function Mounting()
	{
		$success=false;
		if(HasParentFreeSlot())
		{
	
		}
		return $success;
	}
	
	private function HasParentFreeSlot()
	{
			
	}

	public function Stocking()
	{
		
			
	}
	public function Discarding()
	{
		
	
	}
}
?>