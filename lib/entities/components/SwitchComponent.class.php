<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class SwitchComponent extends Component
{
	private $ipAdress;
	private $portsCount;
	private $uplinkType;
	private $speedMbit;
	private $configurationFilePath;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setIpAdress($row[DB_COMPONENT_SC_IP]);
    		$this->setPortsCount($row[DB_COMPONENT_SC_PORTSCOUNT]);
    		$this->setUplinkType($row[DB_COMPONENT_SC_UPLINKTYPE]);
    		$this->setSpeedMbit($row[DB_COMPONENT_SC_SPEEDMBIT]);
    		$this->setConfigurationFilePath($row[DB_COMPONENT_SC_CONFIGFILE]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new SwitchComponent();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setIpAdress($this->getIpAdress());
		$copy->setPortsCount($this->getPortsCount());
		$copy->setUplinkType($this->getUplinkType());
		$copy->setSpeedMbit($this->getSpeedMbit());
		$copy->setConfigurationFilePath($this->getConfigurationFilePath());
	
	    return $copy;
	}
	
	public function getIpAdress()
	{
		return $this->ipAdress;
	}
	
	public function setIpAdress($ipAdress)
	{
		$this->ipAdress=$ipAdress;
	}
	
	public function getPortsCount()
	{
		return $this->portsCount;
	}
	
	public function setPortsCount($portsCount)
	{
		$this->portsCount=$portsCount;
	}
	
	public function getUplinkType()
	{
		return $this->uplinkType;
	}
	
	public function setUplinkType($uplinkType)
	{
		$this->uplinkType=$uplinkType;
	}
	
	public function getSpeedMbit()
	{
		return $this->speedMbit;
	}
	
	public function setSpeedMbit($speedMbit)
	{
		$this->speedMbit=$speedMbit;
	}
	
	public function getConfigurationFilePath()
	{
		return $this->configurationFilePath;
	}
	
	public function setConfigurationFilePath($configurationFilePath)
	{
		$this->configurationFilePath=$configurationFilePath;
	}
	
}
