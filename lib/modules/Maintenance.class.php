<?php

/**
 * Class for Maintenance.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Maintencancer
{
	const MODULE_NAME = "MAINTENANCE";
	const MODULE_TITLE = "Maintenance";

	private $SourceComponent;
	private $TargetComponent;
	private $TargetRoom;
	
	public function __construct(array $SourceRow=null,array $TargetRow=null, $SourceComponent=NULL,$TargetComponent=NULL)
	{
		if ($SourceComponent==null){
			$this->SourceComponent =getComponent($SourceRow);
		}
		else {
			$this->SourceComponent=$SourceComponent;
		}
		if ($TargetComponent==null) {
			$this->TargetComponent=getComponent($ResultRow);
			$this->TargetRoom=$TargetRow[DB_COMPONENT_ROOM];
		}
		else {
			$this->TargetComponent=$TargetComponent;
			$this->TargetRoom=$TargetComponent->getRoom();
		}
		

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

	public function Maintain()
	{
		$MaintainSucceed=false;
		if ($this->TargetRoom==null||$this->SourceComponent==null) {
			return $MaintainSucceed;
		}
		else if ($this->SourceComponent->getComponentType()==$this->TargetComponent->getComponentType()) {
			$MaintainSucceed=$this->Changing();
			$this->TargetComponent->update();
		}
		else if($this->TargetComponent!=null)
		{
			$MaintainSucceed=$this->Mounting();
			$this->TargetComponent->update();
		}
		else
		{
			$MaintainSucceed=$this->Removing();
		}
		$this->SourceComponent->update();
		return $MaintainSucceed;
	}

	private function Changing()
	{
		//Remove childs rows if no childs change their Parent
		if(!$this->CanChange()){
			return false;
		}
		
		$tmpParent=$this->SourceComponent->getParent();
		$this->SourceComponent->assignParent($this->TargetComponent->getParent);
		$this->TargetComponent->assignParent($tmpParent);
		
		$tmpRoom=$this->SourceComponent->getRoom();
		$this->SourceComponent->setRoom($this->TargetComponent->getRoom());
		$this->TargetComponent->setRoom($tmpRoom);
		
		$tmpChilds=$this->SourceComponent->getChilds();
		$this->SourceComponent->assignChilds($this->TargetComponent->getChilds());
		$this->TargetComponent->assignChilds($tmpChilds);
		return true;
	}

	private function Removing()
	{
		$this->SourceComponent->setRoom($this->TargetRoom);
		$this->SourceComponent->setParent(null);
		$TargetRow=array(DB_COMPONENT_ROOM=>$this->TargetRoom);
		//Removing all childs to target room
		foreach ($this->SourceComponent->getChilds() as $child)
		{
			if ($child==null) {
				continue;
			}
			$maintaining=new Maintencancer(null, $TargetRow,$child,null);
			if (!$maintaining->Maintain()) {
				return false;
			}
		}
		return true;
	}

	private function Mounting()
	{
		//Check if child is allowed to mount in parent
		if(!$this->CanMount()){
			return false;
		}
		$this->SourceComponent->setRoom($this->TargetComponent->getRoom());
		$this->SourceComponent->assignParent($this->TargetComponent);
		return true;
	}
	
	private function CanMount()
	{
		//Check if mounting is possible
		return true;
	}
	
	private function CanChange()
	{
		//Check if changing is possible
		return true;
	}
	
	private static function getComponent($row)
	{

		switch($row[DB_COMPONENT_TYPE])
		{
			case DB_COMPONENT_TYPE_ACCESS_POINT:
				return new AccessPoint($row);


			case DB_COMPONENT_TYPE_COMPUTER:
				return new Computer($row);


			case DB_COMPONENT_TYPE_CPU:
				return new CPU($row);


			case DB_COMPONENT_TYPE_DISK_CONTROLLER:
				return new DiskController($row);


			case DB_COMPONENT_TYPE_GRAPHICS_CARD:
				return new GraphicCard($row);
					

			case DB_COMPONENT_TYPE_HARD_DRIVE:
				return new HardDrive($row);


			case DB_COMPONENT_TYPE_HUB:
				return new Hub($row);
					

			case DB_COMPONENT_TYPE_MAINBOARD:
				return new Mainboard($row);
					

			case DB_COMPONENT_TYPE_NETWORK_CARD:
				return new NetworkCard($row);


			case DB_COMPONENT_TYPE_PRINTER:
				return new Printer($row);
					

			case DB_COMPONENT_TYPE_RAID_CONTROLLER:
				return new RaidController($row);


			case DB_COMPONENT_TYPE_RAM:
				return new RAM($row);
					

			case DB_COMPONENT_TYPE_ROUTER:
				return new Router($row);

			case DB_COMPONENT_TYPE_SOFTWARE:
				return new Software($row);

			case DB_COMPONENT_TYPE_SWITCH_COMPONENT:
				return new SwitchComponent($row);


			case DB_COMPONENT_TYPE_VLAN:
				return new Vlan($row);


			default:
				return null;
		}
			
	}
}
	?>