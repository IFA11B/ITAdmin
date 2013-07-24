<?php
class ComponentMounter
{
		private $IdComponent;
		private $IdParent;
		public function __construct($idComponent)
		{
			$this->IdComponent=$idComponent;
			$this->IdParent=MaintanceCommonHelper::GetParentComponent($this->IdComponent);
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