<?php
require_once ('com.Component.php');
class GraphicCard extends Component
{
	private $InterfaceType;
	private $SpaceMbyte;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getInterfaceType()
	{
		if ($this->InterfaceType==null) {
			return '';
		}
		return $this->InterfaceType;
	}
	
	public function setInterfaceType($InterfaceType)
	{
		$this->InterfaceType=$InterfaceType;
	}
	public function getSpaceMbyte()
	{
		if ($this->SpaceMbyte==null) {
			return '';
		}
		return $this->SpaceMbyte;
	}
	
	public function setSpaceMbyte($SpaceMbyte)
	{
		$this->SpaceMbyte=$SpaceMbyte;
	}
	
}
?>