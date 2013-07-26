<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Router extends Component
{
	private $ipConfiguration1;
	private $ipConfiguration2;
	private $ipConfiguration3;
	private $ipConfiguration4;
	private $configurationFilePath;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setIpConfiguration1($row[DB_COMPONENT_R_IPCONFIG1]);
    		$this->setIpConfiguration2($row[DB_COMPONENT_R_IPCONFIG2]);
    		$this->setIpConfiguration3($row[DB_COMPONENT_R_IPCONFIG3]);
    		$this->setIpConfiguration4($row[DB_COMPONENT_R_IPCONFIG4]);
    		$this->setConfigurationFilePath($row[DB_COMPONENT_R_CONFIGFILE]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new Router();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setIpConfiguration1($this->getIpConfiguration1());
		$copy->setIpConfiguration2($this->getIpConfiguration1());
		$copy->setIpConfiguration3($this->getIpConfiguration1());
		$copy->setIpConfiguration4($this->getIpConfiguration1());
		$copy->setConfigurationFilePath($this->getConfigurationFilePath());
	
	    return $copy;
	}
	
	public function getIpConfiguration1()
	{
		return $this->ipConfiguration1;
	}
	
	public function setIpConfiguration1($ipConfiguration)
	{
		$this->ipConfiguration1=$ipConfiguration;
	}
	
	public function getIpConfiguration2()
	{
		return $this->ipConfiguration2;
	}
	
	public function setIpConfiguration2($ipConfiguration)
	{
		$this->ipConfiguration2=$ipConfiguration;
	}

	public function getIpConfiguration3()
	{
		return $this->ipConfiguration3;
	}
	
	public function setIpConfiguration3($ipConfiguration)
	{
		$this->ipConfiguration3=$ipConfiguration;
	}
	
	public function getIpConfiguration4()
	{
		return $this->ipConfiguration4;
	}
	
	public function setIpConfiguration4($ipConfiguration)
	{
		$this->ipConfiguration4=$ipConfiguration;
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
