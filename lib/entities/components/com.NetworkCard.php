<?php
class NetworkCard extends Component
{
	private $SpeedMbit;
	private $InterfaceExtern;
	private $InterfaceIntern;
	private $PortsCount;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setSpeedMbit($row[DB_COMPONENT_NC_SPEEDMBIT]);
		$this->setInterfaceExtern($row[DB_COMPONENT_NC_INTERFACEEXTERN]);
		$this->setInterfaceIntern($row[DB_COMPONENT_NC_INTERFACEINTERN]);
		$this->setPortsCount($row[DB_COMPONENT_NC_PORTSCOUNT]);
	}
	
	public function getSpeedMbit()
	{
		return $this->SpeedMbit;
	}
	
	public function setSpeedMbit($SpeedMbit)
	{
		$this->SpeedMbit=$SpeedMbit;
	}
	
	public function getInterfaceExtern()
	{
		return $this->InterfaceExtern;
	}
	
	public function setInterfaceExtern($InterfaceExtern)
	{
		$this->InterfaceExtern=$InterfaceExtern;
	}
	
	public function getInterfaceIntern()
	{
		return $this->InterfaceIntern;
	}
	
	public function setInterfaceIntern($InterfaceIntern)
	{
		$this->InterfaceIntern=$InterfaceIntern;
	}
	
	public function getPortsCount()
	{
		return $this->PortsCount;
	}
	
	public function setPortsCount($PortsCount)
	{
		$this->PortsCount=$PortsCount;
	}
	
}
?>