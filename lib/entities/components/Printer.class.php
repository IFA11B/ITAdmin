<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Printer extends Component
{
	private $ipAdress;
	private $printerType;
	private $colorMode;
	private $connectionType;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setIpAdress($row[DB_COMPONENT_P_IP]);
    		$this->setPrinterType($row[DB_COMPONENT_P_PRINTERTYPE]);
    		$this->setColorMode($row[DB_COMPONENT_P_COLORMODE]);
    		$this->setConnectionType($row[DB_COMPONENT_P_CONNECTIONTYPE]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new Printer();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setIpAdress($this->getIpAdress());
		$copy->setPrinterType($this->getPrinterType());
		$copy->setColorMode($this->getColorMode());
		$copy->setConnectionType($this->getConnectionType());
	
	    return $copy;
	}
	
	public function getIpAdress()
	{
		return $this->ipAdress;
	}
	
	public function setIpAdress($ipAdress)
	{
		$this->ipAdress=$ipAdress;
	}
	
	public function getPrinterType()
	{
		return $this->printerType;
	}
	
	public function setPrinterType($printerType)
	{
		$this->printerType=$printerType;
	}
	
	public function getColorMode()
	{
		return $this->colorMode;
	}
	
	public function setColorMode($ColorMode)
	{
		$this->colorMode=$ColorMode;
	}
	
	public function getConnectionType()
	{
		return $this->connectionType;
	}
	
	public function setConnectionType($connectionType)
	{
		$this->connection=$connectionType;
	}
	
}
