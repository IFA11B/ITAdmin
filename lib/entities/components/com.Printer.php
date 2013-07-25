<?php
class Printer extends Component
{
	private $IpAdress;
	private $PrinterType;
	private $ColorMode;
	private $ConnectionType;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setIpAdress($row[DB_COMPONENT_P_IP]);
		$this->setPrinterType($row[DB_COMPONENT_P_PRINTERTYPE]);
		$this->setColorMode($row[DB_COMPONENT_P_COLORMODE]);
		$this->setConnectionType($row[DB_COMPONENT_P_CONNECTIONTYPE]);
	}
	
	public function copy()
	{
		$TargetComponent=new Printer();
		$this->copyBase($TargetComponent);
		$TargetComponent->setIpAdress($this->getIpAdress());
		$TargetComponent->setPrinterType($this->getPrinterType());
		$TargetComponent->setColorMode($this->getColorMode());
		$TargetComponent->setConnectionType($this->getConnectionType());
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
	
	public function getPrinterType()
	{
		return $this->PrinterType;
	}
	
	public function setPrinterType($printerType)
	{
		$this->PrinterType=$printerType;
	}
	
	public function getColorMode()
	{
		return $this->ColorMode;
	}
	
	public function setColorMode($ColorMode)
	{
		$this->ColorMode=$ColorMode;
	}
	
	public function getConnectionType()
	{
		return $this->ConnectionType;
	}
	
	public function setConnectionType($connectionType)
	{
		$this->Connection=$connectionType;
	}
	
}
?>