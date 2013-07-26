<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Hub extends Component
{
	private $portsCount;
	private $speedMbit;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setPortsCount($row[DB_COMPONENT_HUB_PORTSCOUNT]);
		    $this->setSpeedMbit($row[DB_COMPONENT_HUB_SPEEDMBIT]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new Hub();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setPortsCount($this->getPortsCount());
		$copy->setSpeedMbit($this->getSpeedMbit());
	
	    return $copy;
	}
	
	public function getFields() {
	    $result = parent::getFields();
	     
	    $result[] = array(
	        'name' => 'Anzahl Ports',
	        'type' => 'number',
	        'value' => $this->getPortsCount());
	     
	    $result[] = array(
	        'name' => 'Geschwindigkeit',
	        'type' => 'string',
	        'value' => $this->getSpeedMbit());
	     
	    return $result;
	}
	
	public function getPortsCount()
	{
		return $this->portsCount;
	}
	
	public function setPortsCount($portsCount)
	{
		$this->portsCount=$portsCount;
	}
	
	public function getSpeedMbit()
	{
		return $this->speedMbit;
	}
	
	public function setSpeedMbit($speedMbit)
	{
		$this->speedMbit=$speedMbit;
	}
}
