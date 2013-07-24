<?php

class DiskController extends Component
{
	private $DiskType;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
	}
	
	public function getDiskType()
	{
		return $this->DiskType;
	}
	
	public function setDiskType(string $DiskType)
	{
		$this->DiskType=$DiskType;
	}
	
}
?>