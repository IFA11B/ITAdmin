<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class AccessPoint extends Component
{
	private $ipAdress;
	private $configurationFilePath;

	public function __construct(array $row = null)
	{
		parent::__construct($row);
		
		if ($row != null)
		{
    		$this->setIpAdress($row[DB_COMPONENT_AP_IP]);
    		$this->setConfigurationFilePath($row[DB_COMPONENT_AP_CONFIGFILE]);	
		}
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
		    $copy = new AccessPoint();
	    }
	    
		parent::copy($copy);
		
		$copy->setIpAdress($this->getIpAdress());
		$copy->setConfigurationFilePath($this->getConfigurationFilePath());
		
		return $copy;
	}
	
	public function getFields() {
	    $result = parent::getFields();
	    
	    $result[] = array(
	        'name' => 'IP Adresse',
	        'type' => 'ip',
	        'value' => $this->getIpAdress());
	    
	    $result[] = array(
	        'name' => 'Konfiguration',
	        'type' => 'string',
	        'value' => $this->getConfigurationFilePath());
	    
	    return $result;
	}
	
	public function getIpAdress()
	{
		return $this->ipAdress;
	}

	public function setIpAdress($ipAdress)
	{
		$this->ipAdress=$ipAdress;
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
