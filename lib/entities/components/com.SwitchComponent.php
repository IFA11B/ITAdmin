<?php
require_once ('com.Component.php');
class SwitchComponent extends Component
{
	private $IpAdress;
	private $PortsCount;
	private $UplinkType;
	private $SpeedMbit;
	private $ConfigurationFilePath;
	
	public function __construct(array $row = NULL)
	{
		parent::__construct($row);
	}
	
	public function getIpAdress()
	{
		return $this->IpAdress;
	}
	
	public function setVersion(string $IpAdress)
	{
		$this->IpAdress=$IpAdress;
	}
	
	public function getPortsCount()
	{
		return $this->PortsCount;
	}
	
	public function setPortsCount(int $PortsCount)
	{
		$this->PortsCount=$PortsCount;
	}
	
	public function getUplinkType()
	{
		return $this->UplinkType;
	}
	
	public function setUplinkType(string $UplinkType)
	{
		$this->UplinkType=$UplinkType;
	}
	
	public function getSpeedMbit()
	{
		return $this->SpeedMbit;
	}
	
	public function setSpeedMbit(int $SpeedMbit)
	{
		$this->SpeedMbit=$SpeedMbit;
	}
	
	public function getConfigurationFilePath()
	{
		return $this->ConfigurationFilePath;
	}
	
	public function setConfigurationFilePath(string $ConfigurationFilePath)
	{
		$this->ConfigurationFilePath=$ConfigurationFilePath;
	}
	
}
?>