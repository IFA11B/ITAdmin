<?php
require_once ('com.Component.php');
class AccessPoint extends Component
{
	private $IpAdress;
	private $ConfigurationFilePath;

	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
	}

	public function getIpAdress()
	{
		return $this->IpAdress;
	}

	public function setIpAdress(string $ipAdress)
	{
		$this->IpAdress=$ipAdress;
	}

	public function getConfigurationFilePath()
	{
		return $this->ConfigurationFilePath;
	}

	public function setConfigurationFilePath(string $configurationFilePath)
	{
		$this->ConfigurationFilePath=$configurationFilePath;
	}
}
?>
