<?php
class Ram extends Component
{
	private $SpaceMByte;
	private $ClockSpeedMHz;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getSpaceMbyte()
	{
		if ($this->SpaceMbyte==null)
		{
			return 0;
		}
		return $this->SpaceMbyte;
	}
	
	public function setSpaceMbyte(int $spaceMbyte)
	{
		$this->SpaceMbyte=$spaceMbyte;
	}
	
	public function getClockSpeedMHz()
	{
		if ($this->$ClockSpeedMHz==null)
		{
			return 0;
		}
		return $this->ClockSpeedMHz;
	}
	
	public function setDriverType(int $clockSpeedMHz)
	{
		$this->ClockSpeedMHz=$clockSpeedMHz;
	}

}
