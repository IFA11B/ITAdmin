<?php
class Vlan extends Component
{
	private $Tag;
	private $Port;
	
	public function __construct(array $row=null)
	{
		parent::__construct($row);
		$this->setTag($row[DB_COMPONENT_VLAN_TAG]);
		$this->setPort($row[DB_COMPONENT_VLAN_PORT]);
	}
	
	public function getTag()
	{
		return $this->Tag;
	}
	
	public function setTag($Tag)
	{
		$this->Tag=$Tag;
	}
	
	public function getPort()
	{
		return $this->Port;
	}
	
	public function setPort($Port)
	{
		$this->Port=$Port;
	}
}
?>