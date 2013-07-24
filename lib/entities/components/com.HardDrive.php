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
	}
	
	public function getInterfaceType()
	{
		return $this->InterfaceType;
	}
	
	public function setInterfaceType(string $interfaceType)
	{
		$this->InterfaceType=$interfaceType;
	}
	
	public function getPurpose()
	{
		return $this->Purpose;
	}
	
	public function setPurpose(string $purpose)
	{
		$this->Purpose=$purpose;
	}
	
	public function getSpaceMbyte()
	{
		return $this->SpaceMbyte;
	}
	
	public function setSpaceMbyte(int $spaceMbyte)
	{
		$this->SpaceMbyte=$spaceMbyte;
	}
	
	public function getDriveType()
	{
		return $this->DriveType;
	}
	
	public function setDriverType(string $driveType)
	{
		$this->DriveType=$driveType;
	}
	
}
?>
