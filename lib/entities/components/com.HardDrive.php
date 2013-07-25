<?php
class HardDrive extends Component
{
	private $InterfaceType;
	private $Purpose;
	private $SpaceMbyte;
	private $DriveType;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setInterfaceType($row[DB_COMPONENT_HDD_INTERFACETYPE]);
		$this->setPurpose($row[DB_COMPONENT_HDD_PURPOSE]);
		$this->setSpaceMbyte($row[DB_COMPONENT_HDD_SPACEMBYTE]);
		$this->setDriverType($row[DB_COMPONENT_HDD_DRIVETYPE]);
	}
	
	public function copy()
	{
		$TargetComponent=new HardDrive();
		$this->copyBase($TargetComponent);
		$TargetComponent->setInterfaceType($this->getInterfaceType());
		$TargetComponent->setPurpose($this->getPurpose());
		$TargetComponent->setSpaceMbyte($this->getSpaceMbyte());
		$TargetComponent->setDriverType($this->getDriverType());
		return $TargetComponent;
	}
	
	public function getInterfaceType()
	{
		return $this->InterfaceType;
	}
	
	public function setInterfaceType($interfaceType)
	{
		$this->InterfaceType=$interfaceType;
	}
	
	public function getPurpose()
	{
		return $this->Purpose;
	}
	
	public function setPurpose($purpose)
	{
		$this->Purpose=$purpose;
	}
	
	public function getSpaceMbyte()
	{
		return $this->SpaceMbyte;
	}
	
	public function setSpaceMbyte($spaceMbyte)
	{
		$this->SpaceMbyte=$spaceMbyte;
	}
	
	public function getDriveType()
	{
		return $this->DriveType;
	}
	
	public function setDriverType($driveType)
	{
		$this->DriveType=$driveType;
	}
	
}
?>
