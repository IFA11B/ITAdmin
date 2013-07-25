<?php

class DiskController extends Component
{
	private $DiskType;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setDiskType($row[DB_COMPONENT_DC_DISKTYPE]);
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