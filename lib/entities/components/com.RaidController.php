<?php
require_once ('com.Component.php');
class RaidController extends Component
{
	private $RaidLevel;
	
	public function __construct()
	{
		parent::__construct($parent->Room,$parent);
	}
	
	public function getRaidLevel()
	{
		if ($this->RaidLevel==null) {
			return 0;
		}
		return $this->RaidLevel;
	}
	
	public function setRaidLevel(int $RaidLevel)
	{
		$this->RaidLevel=$RaidLevel;
	}
}
?>