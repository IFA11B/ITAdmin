<?php
require_once ('com.Component.php');
class Printer extends Component
{
	private $IpAdress;
	private $PrinterType;
	private $HasColor;
	private $ConnectionType;
	
	public function __construct(string $room)
	{
		parent::__construct($room);
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
	
	public function getPrinterType()
	{
		if ($this->PrinterType==null) {
			return '';
		}
		return $this->PrinterType;
	}
	
	public function setPrinterType($printerType)
	{
		$this->PrinterType=$printerType;
	}
	
	public function getHasColor()
	{
		if ($this->HasColor==null) {
			return false;
		}
		return $this->HasColor;
	}
	
	public function setHasColor(bool $hasColor)
	{
		$this->HasColor=$hasColor;
	}
	
	public function getConnectionType()
	{
		if ($this->ConnectionType==null) {
			return '';
		}
		return $this->ConnectionType;
	}
	
	public function setConnectionType($connectionType)
	{
		$this->Connection=$connectionType;
	}
	
}
?>