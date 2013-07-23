<?php
	class DatabaseMaintanceHelper
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
		public function CommitChange()
		{
			CommitChilds($this->IdOldComponent);
			CommitAdd($this->IdOldComponent);
		}
		private function CacheComponent($idComponent)
		{
			GetAttributes($idComponent);
		}
		private function GetAttributes($idComponent)
		{
			
		}
		private function CommitChilds($idComponent)
		{
			foreach ($idChild as CommonMaintainHelper::GetChildComponents($idComponent))
			{
				$childs=CommonMaintainHelper::GetChildComponents($idChild);
				if (array_count_values($childs)!=null) 
				{
					foreach ($child as $childs)
						CommitChilds($child);
				}
				else 
				{
					CacheComponent($idChild);
					CommitDelete($idChild);
					CommitAdd($idChild);
				}
			}
			
		}
		private function CommitDelete($idComponent)
		{
								
		}
		private function CommitAdd($idComponent)
		{
			
		}
	}
?>