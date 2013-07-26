<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class NetworkCard extends Component
{
	private $speedMbit;
	private $interfaceExtern;
	private $interfaceIntern;
	private $portsCount;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setSpeedMbit($row[DB_COMPONENT_NC_SPEEDMBIT]);
    		$this->setInterfaceExtern($row[DB_COMPONENT_NC_INTERFACEEXTERN]);
    		$this->setInterfaceIntern($row[DB_COMPONENT_NC_INTERFACEINTERN]);
    		$this->setPortsCount($row[DB_COMPONENT_NC_PORTSCOUNT]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new NetworkCard();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setSpeedMbit($this->getSpeedMbit());
		$copy->setInterfaceExtern($this->getInterfaceExtern());
		$copy->setInterfaceIntern($this->getInterfaceIntern());
		$copy->setPortsCount($this->getPortsCount());
	
	    return $copy;
	}
	
	public function getFields() {
	    $result = parent::getFields();
	     
	    $result[] = array(
	        'name' => 'Geschwindigkeit',
	        'type' => 'number',
	        'value' => $this->getSpeedMbit());
	     
	    $result[] = array(
	        'name' => 'Schnittstelle Intern',
	        'type' => 'enum',
	        'value' => $this->getInterfaceIntern(),
	        'values' => null);
	    
	    $result[] = array(
	        'name' => 'Schnittstelle Extern',
	        'type' => 'enum',
	        'value' => $this->getInterfaceExtern(),
	        'values' => null);
	    
	    $result[] = array(
	        'name' => 'Anzahl Ports',
	        'type' => 'number',
	        'value' => $this->getPortsCount());
	     
	    return $result;
	}
	
	public function getSpeedMbit()
	{
		return $this->speedMbit;
	}
	
	public function setSpeedMbit($speedMbit)
	{
		$this->speedMbit=$speedMbit;
	}
	
	public function getInterfaceExtern()
	{
		return $this->interfaceExtern;
	}
	
	public function setInterfaceExtern($interfaceExtern)
	{
		$this->interfaceExtern=$interfaceExtern;
	}
	
	public function getInterfaceIntern()
	{
		return $this->interfaceIntern;
	}
	
	public function setInterfaceIntern($interfaceIntern)
	{
		$this->interfaceIntern=$interfaceIntern;
	}
	
	public function getPortsCount()
	{
		return $this->portsCount;
	}
	
	public function setPortsCount($portsCount)
	{
		$this->portsCount=$portsCount;
	}
	
}
?>