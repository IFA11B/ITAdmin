<?php
class PowerSupply extends Component
{
	private $OutputWatt;
	private $ConnectorTypeCPU;
	private $ConnectorTypeMB;
	private $ConnectorsCount;

	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setOutputWatt($row[DB_COMPONENT_PS_POWER]);
		$this->setConnectorTypeCPU($row[DB_COMPONENT_PS_CPUTYPE]);
		$this->setConnectorTypeMB($row[DB_COMPONENT_PS_MAINBOARDTYPE]);
		$this->setConnectorsCount($row[DB_COMPONENT_PS_COUNT]);
	}

	public function copy()
	{
		$TargetComponent=new PowerSupply();
		$this->copyBase($TargetComponent);
		$TargetComponent->setOutputWatt($this->getOutputWatt());
		$TargetComponent->setConnectorTypeCPU($this->getConnectorTypeCPU());
		$TargetComponent->setConnectorTypeMB($this->getConnectorTypeMB());
		$TargetComponent->setConnectorsCount($this->getConnectorsCount());
		return $TargetComponent;
	}

	public function getOutputWatt()
	{
		return $this->OutputWatt;
	}

	public function setOutputWatt($OutputWatt)
	{
		$this->OutputWatt=$OutputWatt;
	}

	public function getConnectorTypeCPU()
	{
		return $this->ConnectorTypeCPU;
	}

	public function setConnectorTypeCPU($ConnectorTypeCPU)
	{
		$this->ConnectorTypeCPU=$ConnectorTypeCPU;
	}

	public function getConnectorTypeMB()
	{
		return $this->ConnectorTypeMB;
	}

	public function setConnectorTypeMB($ConnectorTypeMB)
	{
		$this->ConnectorTypeMB=$ConnectorTypeMB;
	}
	
	public function getConnectorsCount()
	{
		return $this->ConnectorsCount;
	}
	
	public function setConnectorsCount($ConnectorsCount)
	{
		$this->ConnectorsCount=$ConnectorsCount;
	}
}
?>

