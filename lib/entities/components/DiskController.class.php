<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class DiskController extends Component
{
	private $diskType;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setDiskType($row[DB_COMPONENT_DC_DISKTYPE]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new DiskController();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setDiskType($this->getDiskType());
	
	    return $copy;
	}
	
	public function getDiskType()
	{
		return $this->diskType;
	}
	
	public function setDiskType($DiskType)
	{
		$this->diskType=$DiskType;
	}
	
}
