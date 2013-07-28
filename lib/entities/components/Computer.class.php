<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Computer extends Component
{
	private $ipAddress;
	private $subnet;
	private $gateway;

	public function getIpAddress()
	{
		return $this->ipAddress;
	}
	
	public function setIpAddress($ipAddress)
	{
		$this->ipAddress=$ipAddress;
	}
	
	public function getSubnet()
	{
		return $this->subnet;
	}
	
	public function setSubnet($subnet)
	{
		$this->subnet=$subnet;
	}
	
	public function getGateway()
	{
		return $this->gateway;
	}
	
	public function setGateway($gateway)
	{
		$this->gateway=$gateway;
	}	
	
	public function __construct(array $row=NULL)
	{
		if ($row != null) {
		
			parent::__construct($row);	
			
			$component_row = DataManagement::getInstance()->getComponentData($row[DB_COMPONENT_TYPE], $row[DB_COMPONENT_ATTRIBUTE_TO_COMPONENT_ENTITY]);
			
    		$this->setIpAddress($component_row[DB_COMPONENT_PC_IP]);
    		$this->setSubnet($component_row[DB_COMPONENT_PC_SUBNET]);
    		$this->setGateway($component_row[DB_COMPONENT_PC_GATEWAY]);
    	}
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new Computer();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setIpAdress($this->getIpAdress());
		$copy->setSubnet($this->getSubnet());
		$copy->setGateway($this->getGateway());
	
	    return $copy;
	}
	
	public function getFields() {
	    $result = parent::getFields();
	     
	    $result[] = array(
	        'name' => 'IP Adresse',
	        'type' => 'ip',
	        'value' => $this->getIpAddress());
	     
	    $result[] = array(
	        'name' => 'Subnetz',
	        'type' => 'ip',
	        'value' => $this->getSubnet());

	    $result[] = array(
	        'name' => 'Gateway',
	        'type' => 'ip',
	        'value' => $this->getGateway());
	     
	    return $result;
	}
	
}
