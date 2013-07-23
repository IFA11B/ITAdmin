<?php
class SwitchComponent extends Component
{
	private $IpAdress;
	private $PortsCount;
	private $UplinkType;
	private $SpeedMbit;
	private $ConfigurationFilePath;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getIpAdress()
	{
		if ($this->IpAdress==null) {
			return '';
		}
		return $this->IpAdress;
	}
	
	public function setVersion($IpAdress)
	{
		$this->IpAdress=$IpAdress;
	}
	
	public function getPortsCount()
	{
		if ($this->PortsCount==null) {
			return 0;
		}
		return $this->PortsCount;
	}
	
	public function setPortsCount(int $PortsCount)
	{
		$this->PortsCount=$PortsCount;
	}
	
	public function getUplinkType()
	{
		if ($this->UplinkType==null) {
			return '';
		}
		return $this->UplinkType;
	}
	
	public function setUplinkType($UplinkType)
	{
		$this->UplinkType=$UplinkType;
	}
	
	public function getSpeedMbit()
	{
		if ($this->SpeedMbit==null) {
			return 0;
		}
		return $this->SpeedMbit;
	}
	
	public function setSpeedMbit(int $SpeedMbit)
	{
		$this->SpeedMbit=$SpeedMbit;
	}
	
	public function getConfigurationFilePath()
	{
		if ($this->ConfigurationFilePath==null) {
			return '';
		}
		return $this->ConfigurationFilePath;
	}
	
	public function setConfigurationFilePath(string $ConfigurationFilePath)
	{
		$this->ConfigurationFilePath=$ConfigurationFilePath;
	}
	
}
?>