<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class GraphicsCard extends Component
{
	private $interfaceType;
	private $spaceMbyte;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setInterfaceType($row[DB_COMPONENT_GC_INTERFACETYPE]);
		$this->setSpaceMbyte($row[DB_COMPONENT_GC_SPACEMBYTE]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new GraphicsCard();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setInterfaceType($this->getInterfaceType());
		$copy->setSpaceMbyte($this->getSpaceMbyte());
	
	    return $copy;
	}
	
	public function getInterfaceType()
	{
		return $this->interfaceType;
	}
	
	public function setInterfaceType($interfaceType)
	{
		$this->interfaceType=$interfaceType;
	}
	public function getSpaceMbyte()
	{
		return $this->spaceMbyte;
	}
	
	public function setSpaceMbyte($spaceMbyte)
	{
		$this->spaceMbyte=$spaceMbyte;
	}
}
