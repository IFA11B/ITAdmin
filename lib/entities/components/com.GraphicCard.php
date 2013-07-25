<?php
class GraphicCard extends Component
{
	private $InterfaceType;
	private $SpaceMbyte;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setInterfaceType($row[DB_COMPONENT_GC_INTERFACETYPE]);
		$this->setSpaceMbyte($row[DB_COMPONENT_GC_SPACEMBYTE]);
	}
	
	public function getInterfaceType()
	{
		return $this->InterfaceType;
	}
	
	public function setInterfaceType($InterfaceType)
	{
		$this->InterfaceType=$InterfaceType;
	}
	public function getSpaceMbyte()
	{
		return $this->SpaceMbyte;
	}
	
	public function setSpaceMbyte($SpaceMbyte)
	{
		$this->SpaceMbyte=$SpaceMbyte;
	}
	
}
?>