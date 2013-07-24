<?php

class Computer extends Component
{
	private $IpAdress;
	private $Subnet;
	private $Gateway;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);	
	}
	
	public function getIpAdress()
	{
		return $this->IpAdress;
	}
	
	public function setIpAdress(string $ipAdress)
	{
		$this->IpAdress=$ipAdress;
	}
	
	public function getSubnet()
	{
		return $this->Subnet;
	}
	
	public function setSubnet(string $subnet)
	{
		$this->Subnet=$subnet;
	}
	
	public function getGateway()
	{
		return $this->Gateway;
	}
	
	public function setGateway(string $gateway)
	{
		$this->Gateway=$gateway;
	}
	
} 
?>
