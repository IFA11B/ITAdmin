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

	public function __construct($parent,array $childs)
	{
		parent::__construct($parent->Room,$parent);
		$this->setChilds($childs);
	}
	
	public function getSockel()
	{
		if ($this->Sockel==null) {
			return '';
		}
		return $this->Sockel; 
	}
	
	public function setSockel(string $sockel)
	{
		$this->Sockel=$sockel;
	}
	
	public function getRamType()
	{
		if ($this->RamType==null) {
			return '';
		}
		return $this->RamType;
	}
	
	public function setRamType(string $ramType)
	{
		$this->RamType=$ramType;
	}

	public function getRamMaxSpace()
	{
		if ($this->RamMaxSpace==null) {
			return '';
		}
		return $this->RamMaxSpace;
	}
	
	public function setRamMaxSpace(string $ramMaxSpace)
	{
		$this->RamMaxSpace=$ramMaxSpace;
	}
	public function getRamSlotsCount()
	{
		if ($this->RamSlotsCount==null) {
			return '';
		}
		return $this->RamSlotsCount;
	}
	
	public function setRamSlotsCount(string $ramSlotsCount)
	{
		$this->RamSlotsCount=$ramSlotsCount;
	}
	
	public function getConnectorTypePowerSupply()
	{
		if ($this->ConnectorTypePowerSupply==null) {
			return '';
		}
		return $this->ConnectorTypePowerSupply;
	}
	
	public function setConnectorTypePowerSupply(string $connectorTypePowerSupply)
	{
		$this->ConnectorTypePowerSupply=$connectorTypePowerSupply;
	}
	
	public function getConnectorTypeCpu()
	{
		if ($this->ConnectorTypeCpu==null) {
			return '';
		}
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
