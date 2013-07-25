<?php
class Router extends Component
{
	private $IpConfigurations;
	private $ConfigurationFilePath;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setIpConfigurations($row[DB_COMPONENT_R_IPCONFIGS]);
		$this->setConfigurationFilePath($row[DB_COMPONENT_R_CONFIGFILE]);
	}
	
	public function getIpConfigurations()
	{
		return $this->IpConfigurations;
	}
	
	public function setIpConfigurations(array $IpConfigurations)
	{
		$this->IpConfigurations=$tmpIpConfiguration;
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