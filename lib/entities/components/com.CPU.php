<?php
class Cpu extends Component
{
	private $Sockel;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setSockel($row[DB_COMPONENT_CPU_SOCKEL]);
	}
	
	public function copy()
	{
		$TargetComponent=new Cpu();
		$this->copyBase($TargetComponent);
		$TargetComponent->setSockel($this->getSockel());
		return $TargetComponent;
	}
	
	public function getSockel()
	{
		return $this->Sockel;
	}
	
	public function setSockel($sockel)
	{
		$this->Sockel=$sockel;
	}
}
?>