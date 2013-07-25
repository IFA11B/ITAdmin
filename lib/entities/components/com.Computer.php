<?php

class Computer extends Component
{
	private $IpAdress;
	private $Subnet;
	private $Gateway;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);	
		$this->setIpAdress($row[DB_COMPONENT_PC_IP]);
		$this->setSubnet($row[DB_COMPONENT_PC_SUBNET]);
		$this->setGateway($row[DB_COMPONENT_PC_GATEWAY]);
	}
	
	public function copy()
	{
		$TargetComponent=new Computer();
		$this->copyBase($TargetComponent);
		$TargetComponent->setIpAdress($this->getIpAdress());
		$TargetComponent->setSubnet($this->getSubnet());
		$TargetComponent->setGateway($this->getGateway());
		return $TargetComponent;
	}
	
	public function getIpAdress()
	{
		return $this->IpAdress;
	}
	
	public function setIpAdress($ipAdress)
	{
		$this->IpAdress=$ipAdress;
	}
	
	public function getSubnet()
	{
		return $this->Subnet;
	}
	
	public function setSubnet($subnet)
	{
		$this->Subnet=$subnet;
	}
	
	public function getGateway()
	{
		return $this->Gateway;
	}
	
	public function setGateway($gateway)
	{
		$this->Gateway=$gateway;
	}
	
} 
?>
