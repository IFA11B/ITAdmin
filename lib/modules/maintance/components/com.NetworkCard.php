<?php
class NetworkCard extends Component
{
	private $SpeedMbit;
	private $InterfaceExtern;
	private $InterfaceIntern;
	private $PortsCount;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getSpeedMbit()
	{
		if ($this->SpeedMbit==null) {
			return 0;
		}
		return $this->SpeedMbit;
	}
	
	public function set(int $SpeedMbit)
	{
		$this->SpeedMbit=$SpeedMbit;
	}
	
	public function getInterfaceExtern()
	{
		if ($this->InterfaceExtern==null) {
			return '';
		}
		return $this->InterfaceExtern;
	}
	
	public function setInterfaceExtern($InterfaceExtern)
	{
		$this->InterfaceExtern=$InterfaceExtern;
	}
	
	public function getInterfaceIntern()
	{
		if ($this->InterfaceIntern==null) {
			return '';
		}
		return $this->InterfaceIntern;
	}
	
	public function setInterfaceIntern($InterfaceIntern)
	{
		$this->InterfaceIntern=$InterfaceIntern;
	}
	
	public function getPortsCount()
	{
		if ($this->PortsCount==null) {
			return 0;
		}
		return $this->PortsCount;
	}
	
	public function setPortsCount(int $PortsCount)
	{
		$this->PortsCount=$PortsCount;
	}
	
}
?>