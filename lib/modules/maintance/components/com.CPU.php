<?php
class Cpu extends Component
{
	private $Sockel;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getSockel()
	{
		if ($this->Sockel==null) {
			return '';
		}
		return $this->Sockel;
	}
	
	public function setSockel(string $sockel)
	{
		$this->Sockel=$sockel;
	}
}
?>