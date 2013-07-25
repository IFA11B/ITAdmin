<?php
class RaidController extends Component
{
	private $RaidLevel;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
		$this->setRaidLevel($row[DB_COMPONENT_RC_RAIDLEVEL]);
	}
	
	public function copy()
	{
		$TargetComponent=new RaidController();
		$this->copyBase($TargetComponent);
		$TargetComponent->setRaidLevel($this->getRaidLevel());
		return $TargetComponent;
	}
	
	public function getRaidLevel()
	{
		return $this->RaidLevel;
	}
	
	public function setRaidLevel($RaidLevel)
	{
		$this->RaidLevel=$RaidLevel;
	}
}
?>