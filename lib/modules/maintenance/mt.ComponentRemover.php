<?php
	class ComponentRemover
	{
		private $IdComponent;
		private $IdChildsList;
		
		public function __construct($idComponent)
		{
			$this->IdComponent=$idComponent;
			$this->$IdChildsList=MaintanceCommonHelper::GetChildComponents($this->IdComponent);
		}
		public function MaintainComponent()
		{
			$idRoom=MaintanceCommonHelper::GetStockRoomId();
			
		}
		public function DiscardComponent()
		{
			$idRoom=MaintanceCommonHelper::GetStockRoomId();
				
		}
		
	}
?>