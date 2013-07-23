<?php
require_once ('com.Component.php');
class Computer extends Component
{
	private $IpAdress;
	private $Subnet;
	private $Gateway;
	
	public function __construct(string $room,array $childs)
	{
		parent::__construct($room);	
		$this->setChilds($childs);
	}
	
	public function getIpAdress()
	{
		if ($this->IpAdress==null) {
			return '';
		}
		return $this->IpAdress;
	}
	
	public function setIpAdress(string $ipAdress)
	{
		$this->IpAdress=$ipAdress;
	}
	
	public function getSubnet()
	{
		if ($this->Subnet==null) {
			return '';
		}
		return $this->Subnet;
	}
	
	public function setSubnet(string $subnet)
	{
		$this->Subnet=$subnet;
	}
	
	public function getGateway()
	{
		if ($this->Gateway==null) {
			return '';
		}
		return $this->Gateway;
	}
	
	public function setGateway(string $gateway)
	{
		$this->Gateway=$gateway;
	}
	
} 
?>
