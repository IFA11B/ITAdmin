<?php
require_once ('com.Component.php');
class Cpu extends Component
{
	private $Sockel;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
	}
	
	public function getSockel()
	{
		return $this->Sockel;
	}
	
	public function setSockel(string $sockel)
	{
		$this->Sockel=$sockel;
	}
}
?>