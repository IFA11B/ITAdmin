<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Vlan extends Component
{
	private $tag;
	private $port;
    
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setTag($row[DB_COMPONENT_VLAN_TAG]);
		    $this->setPort($row[DB_COMPONENT_VLAN_PORT]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new Vlan();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setTag($this->getTag());
		$copy->setPort($this->getPort());
	
	    return $copy;
	}
	
	public function getTag()
	{
		return $this->tag;
	}
	
	public function setTag($tag)
	{
		$this->tag=$tag;
	}
	
	public function getPort()
	{
		return $this->port;
	}
	
	public function setPort($port)
	{
		$this->port=$port;
	}
}
