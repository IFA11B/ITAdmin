<?php
class AccessPoint extends Component
{
	private $IpAdress;
	private $ConfigurationFilePath;

	public function __construct(string $room)
	{
		parent::__construct($room);
	}

	public function getIpAdress()
	{
		if ($this->IpAdress==null) {
			return '';
		}
		return $this->IpAdress;
	}

	public function setIpAdress(string $ipAdress)
	{
		$this->IpAdress=$ipAdress;
	}

	public function getConfigurationFilePath()
	{
		if ($this->ConfigurationFilePath==null) {
			return '';
		}
		return $this->ConfigurationFilePath;
	}

	public function setConfigurationFilePath($configurationFilePath)
	{
		$this->ConfigurationFilePath=$configurationFilePath;
	}
}
?>
