<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Mainboard extends Component
{
	private $Sockel;
	private $RamType;
	private $RamMaxSpace;
	private $RamSlotsCount;
	private $ConnectorTypePowerSupply;
	private $ConnectorTypeCpu;
	private $OnboardComponents;
	private $InterfacesIntern;
	private $InterfacesExtern;

	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
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
	
	public function copy()
	{
		$TargetComponent=new Mainboard();
		$this->copyBase($TargetComponent);
		$TargetComponent->setSockel($this->getSockel());
		$TargetComponent->setRamType($this->getRamType());
		$TargetComponent->setRamMaxSpace($this->getRamMaxSpace());
		$TargetComponent->setRamSlotsCount($this->getRamSlotsCount());
		$TargetComponent->setConnectorTypePowerSupply($this->getConnectorTypePowerSupply());
		$TargetComponent->setConnectorTypeCpu($this->getConnectorTypeCpu());
		$TargetComponent->setOnboardComponents($this->getOnboardComponents());
		$TargetComponent->setInterfacesIntern($this->getInterfacesIntern());
		$TargetComponent->setInterfacesExtern($this->getInterfacesExtern());
		return $TargetComponent;
	}
	
	public function getSockel()
	{
		return $this->Sockel; 
	}
	
	public function setSockel($sockel)
	{
		$this->Sockel=$sockel;
	}
	
	public function getRamType()
	{
		return $this->RamType;
	}
	
	public function setRamType($ramType)
	{
		$this->RamType=$ramType;
	}

	public function getRamMaxSpace()
	{
		return $this->RamMaxSpace;
	}
	
	public function setRamMaxSpace($ramMaxSpace)
	{
		$this->RamMaxSpace=$ramMaxSpace;
	}
	public function getRamSlotsCount()
	{
		return $this->RamSlotsCount;
	}
	
	public function setRamSlotsCount($ramSlotsCount)
	{
		$this->RamSlotsCount=$ramSlotsCount;
	}
	
	public function getConnectorTypePowerSupply()
	{
		return $this->ConnectorTypePowerSupply;
	}
	
	public function setConnectorTypePowerSupply($connectorTypePowerSupply)
	{
		$this->ConnectorTypePowerSupply=$connectorTypePowerSupply;
	}
	
	public function getConnectorTypeCpu()
	{
		return $this->ConnectorTypeCpu;
	}
	
	public function setConnectorTypeCpu($connectorTypeCpu)
	{
		$this->ConnectorTypeCpu=$connectorTypePowerCpu;
	}
	
	public function getOnboardComponents()
	{
		return $this->OnboardComponents;
	}
	
	public function setOnboardComponents(array $onboardComponents)
	{
		$this->OnboardComponents=$onboardComponents;
	}
	
	public function getInterfacesIntern()
	{
		return $this->InterfacesIntern;
	}
	
	public function setInterfacesIntern(array $interfacesIntern)
	{
		$this->InterfacesIntern=$interfacesIntern;
	}
	
	public function getInterfacesExtern()
	{
		return $this->InterfacesExtern;
	}
	
	public function setInterfacesExtern(array $interfacesExtern)
	{
		$this->InterfacesExtern=$interfacesExtern;
	}
}
?>
