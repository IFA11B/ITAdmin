<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class AccessPoint extends Component
{
	private $IpAdress;
	private $ConfigurationFilePath;

	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setIpAdress($row[DB_COMPONENT_AP_IP]);
		$this->setConfigurationFilePath($row[DB_COMPONENT_AP_CONFIGFILE]);	
		
	}
	
	public function copy()
	{
		$TargetComponent=new AccessPoint();
		$this->copyBase($TargetComponent);
		$TargetComponent->setIpAdress($this->getIpAdress());
		$TargetComponent->setConfigurationFilePath($this->getConfigurationFilePath());
		return $TargetComponent;
	}
	
	public function getIpAdress()
	{
		return $this->IpAdress;
	}

	public function setIpAdress($ipAdress)
	{
		$this->IpAdress=$ipAdress;
	}

	public function getConfigurationFilePath()
	{
		return $this->ConfigurationFilePath;
	}

	public function setConfigurationFilePath($configurationFilePath)
	{
		$this->ConfigurationFilePath=$configurationFilePath;
	}
}
?>
