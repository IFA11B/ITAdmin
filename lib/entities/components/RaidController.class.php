<?php

/**
 * class for a component type.
 *
 * @author SeiresS <keckchris@web.de>
 */

class RaidController extends Component
{
	private $raidLevel;
	
	public function __construct(array $row = null)
	{
	    parent::__construct($row);
	
	    if ($row != null)
	    {
	        $this->setRaidLevel($row[DB_COMPONENT_RC_RAIDLEVEL]);
	    }
	}
	
	public function copy(Component $copy = null)
	{
	    if ($copy == null) {
	        $copy = new RaidController();
	    }
	     
	    parent::copy($copy);
	
	    $copy->setRaidLevel($this->getRaidLevel());
	
	    return $copy;
	}
	
	public function getRaidLevel()
	{
		return $this->raidLevel;
	}
	
	public function setRaidLevel($raidLevel)
	{
		$this->raidLevel=$raidLevel;
	}
}
