<?php
require_once ('com.Component.php');
class Router extends Component
{
	private $IpConfigurations;
	private $ConfigurationFilePath;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
	}
	
	public function getIpConfigurations()
	{
		return $this->IpConfigurations;
	}
	
	public function setIpConfigurations(array $IpConfigurations)
	{
		if ($IpConfigurations==null) {
			return;
		}
		$tmpIpConfiguration=array('IP1'=>'','IP2'=>'','IP3'=>'','IP4'=>'');
		for ($index=0;$index<array_count_values($IpConfigurations);$index++)
		{
			$tmpIpConfiguration[$index]=$IpConfigurations[$index];
		}
		$this->IpConfigurations=$tmpIpConfiguration;
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