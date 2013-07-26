<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Mainboard extends Component
{
	private $sockel;
	private $ramType;
	private $ramMaxSpace;
	private $ramSlotsCount;
	private $connectorTypePowerSupply;
	private $connectorTypeCpu;
	private $onboardComponents;
	private $interfacesIntern;
	private $interfacesExtern;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setSockel($row[DB_COMPONENT_MB_SOCKEL]);
    		$this->setRamType($row[DB_COMPONENT_MB_RAMTYPE]);
    		$this->setRamMaxSpace($row[DB_COMPONENT_MB_RAMMAXSPACE]);
    		$this->setRamSlotsCount($row[DB_COMPONENT_MB_RAMSLOTSCOUNT]);
    		$this->setConnectorTypePowerSupply($row[DB_COMPONENT_MB_CONNECTORTYPEPOWERSUPPLY]);
    		$this->setConnectorTypeCpu($row[DB_COMPONENT_MB_CONNECTORTYPECPU]);
    		$this->setOnboardComponents($row[DB_COMPONENT_MB_ONBOARD]);
    		$this->setInterfacesIntern($row[DB_COMPONENT_MB_INTERFACESINTERN]);
    		$this->setInterfacesExtern($row[DB_COMPONENT_MB_INTERFACESEXTERN]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new Mainboard();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setSockel($this->getSockel());
		$copy->setRamType($this->getRamType());
		$copy->setRamMaxSpace($this->getRamMaxSpace());
		$copy->setRamSlotsCount($this->getRamSlotsCount());
		$copy->setConnectorTypePowerSupply($this->getConnectorTypePowerSupply());
		$copy->setConnectorTypeCpu($this->getConnectorTypeCpu());
		$copy->setOnboardComponents($this->getOnboardComponents());
		$copy->setInterfacesIntern($this->getInterfacesIntern());
		$copy->setInterfacesExtern($this->getInterfacesExtern());
	
	    return $copy;
	}
	
	public function getSockel()
	{
		return $this->sockel; 
	}
	
	public function setSockel($sockel)
	{
		$this->sockel=$sockel;
	}
	
	public function getRamType()
	{
		return $this->ramType;
	}
	
	public function setRamType($ramType)
	{
		$this->ramType=$ramType;
	}

	public function getRamMaxSpace()
	{
		return $this->ramMaxSpace;
	}
	
	public function setRamMaxSpace($ramMaxSpace)
	{
		$this->ramMaxSpace=$ramMaxSpace;
	}
	public function getRamSlotsCount()
	{
		return $this->ramSlotsCount;
	}
	
	public function setRamSlotsCount($ramSlotsCount)
	{
		$this->ramSlotsCount=$ramSlotsCount;
	}
	
	public function getConnectorTypePowerSupply()
	{
		return $this->connectorTypePowerSupply;
	}
	
	public function setConnectorTypePowerSupply($connectorTypePowerSupply)
	{
		$this->connectorTypePowerSupply=$connectorTypePowerSupply;
	}
	
	public function getConnectorTypeCpu()
	{
		return $this->connectorTypeCpu;
	}
	
	public function setConnectorTypeCpu($connectorTypeCpu)
	{
		$this->connectorTypeCpu=$connectorTypePowerCpu;
	}
	
	public function getOnboardComponents()
	{
		return $this->onboardComponents;
	}
	
	public function setOnboardComponents(array $onboardComponents)
	{
		$this->onboardComponents=$onboardComponents;
	}
	
	public function getInterfacesIntern()
	{
		return $this->interfacesIntern;
	}
	
	public function setInterfacesIntern(array $interfacesIntern)
	{
		$this->interfacesIntern=$interfacesIntern;
	}
	
	public function getInterfacesExtern()
	{
		return $this->interfacesExtern;
	}
	
	public function setInterfacesExtern(array $interfacesExtern)
	{
		$this->interfacesExtern=$interfacesExtern;
	}
}
