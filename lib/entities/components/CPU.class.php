<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Cpu extends Component
{
	private $sockel;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setSockel($row[DB_COMPONENT_CPU_SOCKEL]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new CPU();
	    }
	     
	    parent::copy($copy);
	
	   $copy->setSockel($this->getSockel());
	
	    return $copy;
	}
	
	public function getSockel()
	{
		return $this->sockel;
	}
	
	public function setSockel($sockel)
	{
		$this->sockel=$sockel;
	}
}
