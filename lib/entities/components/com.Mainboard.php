<?php
require_once ('com.Component.php');
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
	}
	
	public function getSockel()
	{
		return $this->Sockel; 
	}
	
	public function setSockel(string $sockel)
	{
		$this->Sockel=$sockel;
	}
	
	public function getRamType()
	{
		return $this->RamType;
	}
	
	public function setRamType(string $ramType)
	{
		$this->RamType=$ramType;
	}

	public function getRamMaxSpace()
	{
		return $this->RamMaxSpace;
	}
	
	public function setRamMaxSpace(int $ramMaxSpace)
	{
		$this->RamMaxSpace=$ramMaxSpace;
	}
	public function getRamSlotsCount()
	{
		return $this->RamSlotsCount;
	}
	
	public function setRamSlotsCount(int $ramSlotsCount)
	{
		$this->RamSlotsCount=$ramSlotsCount;
	}
	
	public function getConnectorTypePowerSupply()
	{
		return $this->ConnectorTypePowerSupply;
	}
	
	public function setConnectorTypePowerSupply(string $connectorTypePowerSupply)
	{
		$this->ConnectorTypePowerSupply=$connectorTypePowerSupply;
	}
	
	public function getConnectorTypeCpu()
	{
		return $this->ConnectorTypeCpu;
	}
	
	public function setConnectorTypeCpu(string $connectorTypeCpu)
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
	
	public function setOnboardComponentsInterfacesIntern(array $interfacesIntern)
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
