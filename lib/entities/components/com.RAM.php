<?php
class Ram extends Component
{
	private $SpaceMByte;
	private $ClockSpeedMHz;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setSpaceMbyte($row[DB_COMPONENT_RAM_SPACEMBYTE]);
		$this->setClockSpeedMHz($row[DB_COMPONENT_RAM_CLOCKSPEEDMHZ]);
	}
	
	public function getSpaceMbyte()
	{
		return $this->SpaceMbyte;
	}
	
	public function setSpaceMbyte($spaceMbyte)
	{
		$this->SpaceMbyte=$spaceMbyte;
	}
	
	public function getClockSpeedMHz()
	{
		return $this->ClockSpeedMHz;
	}
	
	public function setClockSpeedMHz($clockSpeedMHz)
	{
		$this->ClockSpeedMHz=$clockSpeedMHz;
	}

}
