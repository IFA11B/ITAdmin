<?php
class Vlan extends Component
{
	private $Tag;
	private $PortsCount;
	
	public function __construct(array $row=null)
	{
		parent::__construct($row);
	}
	
	public function getTag()
	{
		return $this->Tag;
	}
	
	public function setTag(int $Tag)
	{
		$this->Tag=$Tag;
	}
	
	public function getPortsCount()
	{
		return $this->PortsCount;
	}
	
	public function setPortsCount(int $PortsCount)
	{
		$this->PortsCount=$PortsCount;
	}
}
?>