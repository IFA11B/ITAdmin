<?php
class Mounting
{
		private $IdComponent;
		private $IdParent;
		public function __construct($idComponent)
		{
			$this->IdComponent=$idComponent;
			$this->IdParent=CommonMaintainHelper::GetParentComponent($this->IdComponent);
		}
		public function MountComponent($idRoom)
		{
			$success=false;
			if(HasParentFreeSlot())
			{
				
			}
			return $success;
		}
		private function HasParentFreeSlot() 
		{
			
		}
}
?>