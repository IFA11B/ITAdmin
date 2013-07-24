<?php
class Ram extends Component
{
	private $SpaceMByte;
	private $ClockSpeedMHz;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
	}
	
	public function getSpaceMbyte()
	{
		return $this->SpaceMbyte;
	}
	
	public function setSpaceMbyte(int $spaceMbyte)
	{
		$this->SpaceMbyte=$spaceMbyte;
	}
	
	public function getClockSpeedMHz()
	{
		return $this->ClockSpeedMHz;
	}
	
	public function setDriverType(int $clockSpeedMHz)
	{
		$this->ClockSpeedMHz=$clockSpeedMHz;
	}

}
