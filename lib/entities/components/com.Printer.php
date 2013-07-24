<?php
require_once ('com.Component.php');
class Printer extends Component
{
	private $IpAdress;
	private $PrinterType;
	private $HasColor;
	private $ConnectionType;
	
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
	
	public function getPrinterType()
	{
		return $this->PrinterType;
	}
	
	public function setPrinterType(string $printerType)
	{
		$this->PrinterType=$printerType;
	}
	
	public function getHasColor()
	{
		return $this->HasColor;
	}
	
	public function setHasColor(bool $hasColor)
	{
		$this->HasColor=$hasColor;
	}
	
	public function getConnectionType()
	{
		return $this->ConnectionType;
	}
	
	public function setConnectionType(string $connectionType)
	{
		$this->Connection=$connectionType;
	}
	
}
?>