<?php
class Router extends Component
{
	private $IpConfiguration1;
	private $IpConfiguration2;
	private $IpConfiguration3;
	private $IpConfiguration4;
	private $ConfigurationFilePath;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setIpConfiguration1($row[DB_COMPONENT_R_IPCONFIG1]);
		$this->setIpConfiguration2($row[DB_COMPONENT_R_IPCONFIG2]);
		$this->setIpConfiguration3($row[DB_COMPONENT_R_IPCONFIG3]);
		$this->setIpConfiguration4($row[DB_COMPONENT_R_IPCONFIG4]);
		$this->setConfigurationFilePath($row[DB_COMPONENT_R_CONFIGFILE]);
	}
	
	public function copy()
	{
		$TargetComponent=new Router();
		$this->copyBase($TargetComponent);
		$TargetComponent->setIpConfiguration1($this->getIpConfiguration1());
		$TargetComponent->setIpConfiguration2($this->getIpConfiguration1());
		$TargetComponent->setIpConfiguration3($this->getIpConfiguration1());
		$TargetComponent->setIpConfiguration4($this->getIpConfiguration1());
		$TargetComponent->setConfigurationFilePath($this->getConfigurationFilePath());
		return $TargetComponent;
	}
	
	public function getIpConfiguration1()
	{
		return $this->IpConfiguration1;
	}
	
	public function setIpConfiguration1($IpConfiguration)
	{
		$this->IpConfiguration1=$IpConfiguration;
	}
	
	public function getIpConfiguration2()
	{
		return $this->IpConfiguration2;
	}
	
	public function setIpConfiguration2($IpConfiguration)
	{
		$this->IpConfiguration2=$IpConfiguration;
	}

	public function getIpConfiguration3()
	{
		return $this->IpConfiguration3;
	}
	
	public function setIpConfiguration3($IpConfiguration)
	{
		$this->IpConfiguration3=$IpConfiguration;
	}
	
	public function getIpConfiguration4()
	{
		return $this->IpConfiguration4;
	}
	
	public function setIpConfiguration4($IpConfiguration)
	{
		$this->IpConfiguration4=$IpConfiguration;
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