<?php
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
		$this->setIpAdress($row[DB_COMPONENT_SC_IP]);
		$this->setPortsCount($row[DB_COMPONENT_SC_PORTSCOUNT]);
		$this->setUplinkType($row[DB_COMPONENT_SC_UPLINKTYPE]);
		$this->setSpeedMbit($row[DB_COMPONENT_SC_SPEEDMBIT]);
		$this->setConfigurationFilePath($row[DB_COMPONENT_SC_CONFIGFILE]);
	}
	
	public function getIpAdress()
	{
		return $this->IpAdress;
	}
	
	public function setIpAdress($IpAdress)
	{
		$this->IpAdress=$IpAdress;
	}
	
	public function getPortsCount()
	{
		return $this->PortsCount;
	}
	
	public function setPortsCount($PortsCount)
	{
		$this->PortsCount=$PortsCount;
	}
	
	public function getUplinkType()
	{
		return $this->UplinkType;
	}
	
	public function setUplinkType($UplinkType)
	{
		$this->UplinkType=$UplinkType;
	}
	
	public function getSpeedMbit()
	{
		return $this->SpeedMbit;
	}
	
	public function setSpeedMbit($SpeedMbit)
	{
		$this->SpeedMbit=$SpeedMbit;
	}
	
	public function getConfigurationFilePath()
	{
		return $this->ConfigurationFilePath;
	}
	
	public function setConfigurationFilePath($ConfigurationFilePath)
	{
		$this->ConfigurationFilePath=$ConfigurationFilePath;
	}
	
}
?>