<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class Hub extends Component
{
	private $PortsCount;
	private $SpeedMbit;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setPortsCount($row[DB_COMPONENT_HUB_PORTSCOUNT]);
		$this->setSpeedMbit($row[DB_COMPONENT_HUB_SPEEDMBIT]);
	}
	
	public function copy()
	{
		$TargetComponent=new Hub();
		$this->copyBase($TargetComponent);
		$TargetComponent->setPortsCount($this->getPortsCount());
		$TargetComponent->setSpeedMbit($this->getSpeedMbit());
		return $TargetComponent;
	}
	
	public function getPortsCount()
	{
		return $this->PortsCount;
	}
	
	public function setPortsCount($PortsCount)
	{
		$this->PortsCount=$PortsCount;
	}
	
	public function getSpeedMbit()
	{
		return $this->SpeedMbit;
	}
	
	public function setSpeedMbit($SpeedMbit)
	{
		$this->SpeedMbit=$SpeedMbit;
	}
}
?>