<?php
	class Removing
	{
		private $IdComponent;
		private $IdChildsList;
		
		public function __construct($idComponent)
		{
			$this->IdComponent=$idComponent;
			$this->$IdChildsList=CommonMaintainHelper::GetChildComponents($this->IdComponent);
		}
		public function MaintainComponent()
		{
			$idRoom=CommonMaintainHelper::GetStockRoomId();
			
		}
		public function DiscardComponent()
		{
			$idRoom=CommonMaintainHelper::GetStockRoomId();
				
		}
		
	}
?>