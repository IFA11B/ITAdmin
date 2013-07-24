<?php
class RaidController extends Component
{
	private $RaidLevel;
	
	public function __construct(array $row=NULL)
	{
		parent::__construct($row);
	}
	
	public function getRaidLevel()
	{
		return $this->RaidLevel;
	}
	
	public function setRaidLevel(int $RaidLevel)
	{
		$this->RaidLevel=$RaidLevel;
	}
}
?>