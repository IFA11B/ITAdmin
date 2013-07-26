<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class PowerSupply extends Component
{
	private $outputWatt;
	private $connectorTypeCPU;
	private $connectorTypeMB;
	private $connectorsCount;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setOutputWatt($row[DB_COMPONENT_PS_POWER]);
    		$this->setConnectorTypeCPU($row[DB_COMPONENT_PS_CPUTYPE]);
    		$this->setConnectorTypeMB($row[DB_COMPONENT_PS_MAINBOARDTYPE]);
    		$this->setConnectorsCount($row[DB_COMPONENT_PS_COUNT]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new PowerSupply();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setOutputWatt($this->getOutputWatt());
		$copy->setConnectorTypeCPU($this->getConnectorTypeCPU());
		$copy->setConnectorTypeMB($this->getConnectorTypeMB());
		$copy->setConnectorsCount($this->getConnectorsCount());
	
	    return $copy;
	}

	public function getOutputWatt()
	{
		return $this->outputWatt;
	}

	public function setOutputWatt($outputWatt)
	{
		$this->outputWatt=$outputWatt;
	}

	public function getConnectorTypeCPU()
	{
		return $this->connectorTypeCPU;
	}

	public function setConnectorTypeCPU($connectorTypeCPU)
	{
		$this->connectorTypeCPU=$connectorTypeCPU;
	}

	public function getConnectorTypeMB()
	{
		return $this->connectorTypeMB;
	}

	public function setConnectorTypeMB($connectorTypeMB)
	{
		$this->connectorTypeMB=$connectorTypeMB;
	}
	
	public function getConnectorsCount()
	{
		return $this->connectorsCount;
	}
	
	public function setConnectorsCount($connectorsCount)
	{
		$this->connectorsCount=$connectorsCount;
	}
}
