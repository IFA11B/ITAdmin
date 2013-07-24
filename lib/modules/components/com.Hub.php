<?php
require_once ('com.Component.php');
class Hub extends Component
{
	private $PortsCount;
	private $SpeedMbit;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getPortsCount()
	{
		if ($this->PortsCount==null) {
			return 0;
		}
		return $this->PortsCount;
	}
	
	public function setPortCount(int $PortsCount)
	{
		$this->PortsCount=$PortsCount;
	}
	
	public function getSpeedMbit()
	{
		if ($this->SpeedMbit==null) {
			return 0;
		}
		return $this->SpeedMbit;
	}
	
	public function setSpeedMbit(int $SpeedMbit)
	{
		$this->SpeedMbit=$SpeedMbit;
	}
}
?>