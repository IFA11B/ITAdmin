<?php

class DiskController extends Component
{
	private $DiskType;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setDiskType($row[DB_COMPONENT_DC_DISKTYPE]);
	}
	
	public function copy()
	{
		$TargetComponent=new Cpu();
		$this->copyBase($TargetComponent);
		$TargetComponent->setDiskType($this->getDiskType());
		return $TargetComponent;
	}
	
	public function getDiskType()
	{
		return $this->DiskType;
	}
	
	public function setDiskType($DiskType)
	{
		$this->DiskType=$DiskType;
	}
	
}
?>