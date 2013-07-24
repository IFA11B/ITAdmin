<?php
class ComponentChanger
{
	private $IdOldComponent;
	private $IdNewComponent;
	private $IdOldRoom;
	private $IdNewRoom;
	public function __construct($idOldComponent,$idNewComponent,$idOldRoom,$idNewRoom)
	{
		$this->IdOldComponent=$idOldComponent;
		$this->IdNewComponent=$idNewComponent;
		$this->IdOldRoom=$idOldRoom;
		$this->IdNewRoom=$idNewRoom;
	}
	public function ChangeComponent()
	{
			
	}
}
?>