<?php
class HardDrive extends Component
{
	private $InterfaceType;
	private $Purpose;
	private $SpaceMbyte;
	private $DriveType;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getInterfaceType()
	{
		if ($this->InterfaceType==null) 
		{
			return '';
		}
		return $this->InterfaceType;
	}
	
	public function setInterfaceType(string $interfaceType)
	{
		$this->InterfaceType=$interfaceType;
	}
	
	public function getPurpose()
	{
		if ($this->Purpose==null) 
		{
			return '';
		}
		return $this->Purpose;
	}
	
	public function setPurpose(string $purpose)
	{
		$this->Purpose=$purpose;
	}
	
	public function getSpaceMbyte()
	{
		if ($this->SpaceMbyte==null) 
		{
			return 0;
		}
		return $this->SpaceMbyte;
	}
	
	public function setSpaceMbyte(int $spaceMbyte)
	{
		$this->SpaceMbyte=$spaceMbyte;
	}
	
	public function getDriveType()
	{
		if ($this->DriveType==null)
		{
			return '';
		}
		return $this->DriveType;
	}
	
	public function setDriverType(string $driveType)
	{
		$this->DriveType=$driveType;
	}
	
}
?>
