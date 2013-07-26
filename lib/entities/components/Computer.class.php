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
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);	
		
		if ($row == null) {
    		$this->setIpAdress($row[DB_COMPONENT_PC_IP]);
    		$this->setSubnet($row[DB_COMPONENT_PC_SUBNET]);
    		$this->setGateway($row[DB_COMPONENT_PC_GATEWAY]);
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
	
	public function getIpAddress()
	{
		return $this->ipAddress;
	}
	
	public function setIpAddress($ipAddress)
	{
		$this->ipAdress=$ipAddress;
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
	
}
