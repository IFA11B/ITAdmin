<?php
class DiskController extends Component
{
	private $DiskType;
	
	public function __construct($parent)
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getDiskType()
	{
		if ($this->DiskType==null) {
			return 0;
		}
		return $this->DiskType;
	}
	
	public function setDiskType($DiskType)
	{
		$this->DiskType=$DiskType;
	}
	
}
?>