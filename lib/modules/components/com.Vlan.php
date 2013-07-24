<?php
require_once ('com.Component.php');
class Vlan extends Component
{
	private $Tag;
	private $Port;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getTag()
	{
		if ($this->Tag==null) {
			return 0;
		}
		return $this->Tag;
	}
	
	public function setTag(int $Tag)
	{
		$this->Tag=$Tag;
	}
	
	public function getPort()
	{
		if ($this->Port==null) {
			return 0;
		}
		return $this->Port;
	}
	
	public function setPort(int $Port)
	{
		$this->Port=$Port;
	}
}
?>