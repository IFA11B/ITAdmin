<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Ram extends Component
{
	private $spaceMByte;
	private $clockSpeedMHz;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setSpaceMbyte($row[DB_COMPONENT_RAM_SPACEMBYTE]);
		    $this->setClockSpeedMHz($row[DB_COMPONENT_RAM_CLOCKSPEEDMHZ]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new RAM();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setSpaceMbyte($this->getSpaceMbyte());
		$copy->setClockSpeedMHz($this->getClockSpeedMHz());
	
	    return $copy;
	}
	
	public function getSpaceMbyte()
	{
		return $this->spaceMbyte;
	}
	
	public function setSpaceMbyte($spaceMbyte)
	{
		$this->spaceMbyte=$spaceMbyte;
	}
	
	public function getClockSpeedMHz()
	{
		return $this->clockSpeedMHz;
	}
	
	public function setClockSpeedMHz($clockSpeedMHz)
	{
		$this->clockSpeedMHz=$clockSpeedMHz;
	}

}
