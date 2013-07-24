<?php
require_once ('com.Component.php');
class GraphicCard extends Component
{
	private $InterfaceType;
	private $SpaceMbyte;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
	}
	
	public function getInterfaceType()
	{
		return $this->InterfaceType;
	}
	
	public function setInterfaceType(string $InterfaceType)
	{
		$this->InterfaceType=$InterfaceType;
	}
	public function getSpaceMbyte()
	{
		return $this->SpaceMbyte;
	}
	
	public function setSpaceMbyte(int $SpaceMbyte)
	{
		$this->SpaceMbyte=$SpaceMbyte;
	}
	
}
?>