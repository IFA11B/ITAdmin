<?php
class Hub extends Component
{
	private $PortsCount;
	private $SpeedMbit;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
	}
	
	public function getPortsCount()
	{
		return $this->PortsCount;
	}
	
	public function setPortCount(int $PortsCount)
	{
		$this->PortsCount=$PortsCount;
	}
	
	public function getSpeedMbit()
	{
		return $this->SpeedMbit;
	}
	
	public function setSpeedMbit(int $SpeedMbit)
	{
		$this->SpeedMbit=$SpeedMbit;
	}
}
?>