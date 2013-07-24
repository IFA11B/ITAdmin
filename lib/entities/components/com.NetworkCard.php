<?php
require_once ('com.Component.php');
class NetworkCard extends Component
{
	private $SpeedMbit;
	private $InterfaceExtern;
	private $InterfaceIntern;
	private $PortsCount;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
	}
	
	public function getSpeedMbit()
	{
		return $this->SpeedMbit;
	}
	
	public function set(int $SpeedMbit)
	{
		$this->SpeedMbit=$SpeedMbit;
	}
	
	public function getInterfaceExtern()
	{
		return $this->InterfaceExtern;
	}
	
	public function setInterfaceExtern(string $InterfaceExtern)
	{
		$this->InterfaceExtern=$InterfaceExtern;
	}
	
	public function getInterfaceIntern()
	{
		return $this->InterfaceIntern;
	}
	
	public function setInterfaceIntern(string $InterfaceIntern)
	{
		$this->InterfaceIntern=$InterfaceIntern;
	}
	
	public function getPortsCount()
	{
		return $this->PortsCount;
	}
	
	public function setPortsCount(int $PortsCount)
	{
		$this->PortsCount=$PortsCount;
	}
	
}
?>