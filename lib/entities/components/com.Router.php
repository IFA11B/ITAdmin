<?php
require_once ('com.Component.php');
class Router extends Component
{
	private $IpConfigurations;
	private $ConfigurationFilePath;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getIpConfigurations()
	{
		if ($this->IpConfigurations==null) {
			return array('IP1'=>'','IP2'=>'','IP3'=>'','IP4'=>'');
		}
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
		if ($this->ConfigurationFilePath==null) {
			return '';
		}
		return $this->ConfigurationFilePath;
	}
	
	public function setConfigurationFilePath($ConfigurationFilePath)
	{
		$this->ConfigurationFilePath=$ConfigurationFilePath;
	}
}
?>