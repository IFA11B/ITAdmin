<?php
class Maintencancer
{
	const MODULE_NAME = "MAINTENANCE";
	const MODULE_TITLE = "Maintenance";

	private $SourceComponent;
	private $TargetComponent;
	private $SourceRow;
	private $TargetRow;
	
	public function __construct(array $SourceRow,array $TargetRow)
	{
		$this->SourceRow=$SourceRow;
		$this->TargetRow=$TargetRow;
		$this->SourceComponent =getComponent($SourceRow);
		$this->TargetComponent=getComponent($ResultRow);

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
		if ($this->TargetRow[DB_COMPONENT_ROOM]==null) {
			return false;
		}
		else if ($this->SourceRow[DB_COMPONENT_TYPE]==$this->TargetRow[DB_COMPONENT_TYPE]) {
			$this->TwoComponentsChanging();
			$this->TargetComponent->update();
		}
		else
		{
			$this->OneComponentChanging();
		}
		$this->SourceComponent->update();
		return true;
	}

	private function TwoComponentsChanging()
	{
		$tmpRoom=$this->SourceComponent->getRoom();
		$tmpParent=$this->SourceComponent->getParent();
		$tmpChilds=$this->SourceComponent->getChilds();
		
		$this->SourceComponent->setRoom($this->TargetComponent->getRoom());
		$this->SourceComponent->setParent($this->TargetComponent->getParent);
		$this->SourceComponent->setChilds($this->TargetComponent->getChilds());
		
		$this->TargetComponent->setRoom($tmpRoom);
		$this->TargetComponent->setParent($tmpParent);
		$this->TargetComponent->getChilds($tmpChilds);
	}

	private function OneComponentChanging()
	{
		$this->SourceRow[DB_COMPONENT_ROOM]=$this->TargetRow[DB_COMPONENT_ROOM];
		$this->SourceRow[DB_COMPONENT_PARENT]=$this->TargetRow[DB_COMPONENT_PARENT];
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