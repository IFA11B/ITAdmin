<?php
abstract class Component
{
	private $Name;
	private $Manufacturer;
	private $Room;
	private $PurchaseDate;
	private $WarrantyDuration;
	private $Supplier;
	private $Note;
	private $Parent;
	private $Childs;
	private $HasParent;
	private $HasChilds;
	
	public function __construct(string $room,$parent=NULL)
	{
		$this->Room=$room;
		$this->Parent=$parent;
	}
	
	public function getName()
	{
		if($this->Name==null)
		{
			return '';
		} 
		return $this->Name;
	}
	
	public function setName(string $name)
	{
		$this->Name=$name;
	}
	
	public function getManufacturer()
	{
		if($this->Manufacturer==null)
		{
			return '';
		}
		return $this->Manufacturer;
	}
	
	public function setManufacturer(string $manufacturer)
	{
		$this->Manufacturer=$manufacturer;
	}
	
	public function getRoom()
	{
		if($this->Room==null)
		{
			return '';
		}
		return $this->Room;
	}
	public function setRoom(string $room)
	{
		$this->Room=$room;
	}
	
	public function getPurchaseDate()
	{
		if ($this->PurchaseDate==null) 
		{
			return '';
		}	
		return $this->PurchaseDate;
	}
	public function setPurchaseDate(string $purchaseDate)
	{
		$this->PurchaseDate=$purchaseDate;
	}
	public function setPurchaseDate(string $day,string $month,string $year)
	{
		$this->PurchaseDate=$year.'-'.$month.'-'.$day;
	}
	
	public function getWarrantyDuration()
	{
		if ($this->WarrantyDuration==null)
		{
			return '';
		}
		return $this->WarrantyDuration;
	}
	public function setWarrantyDuration(string $warrantyDuration)
	{
		$this->WarrantyDuration=$warrantyDuration;
	}
	
	public function getSupplier()
	{
		if ($this->Supplier==null)
		{
			return '';
		}
		return $this->Supplier;
	}
	public function setSupplier(string $supplier)
	{
		$this->Supplier=$supplier;
	}
	
	public function getNote()
	{
		if ($this->Note==null) {
			return '';
		}
		return $this->Note;
	}
	public function setNote(string $note)
	{
		$this->Note=$note;
	}
	
	public function getParent()
	{
		return $this->Parent; 
	}
	public function setParent($parent)
	{
		$this->Parent=$parent;
	}
	
	public function getChilds()
	{
		return $this->Childs;
	}
	
	public function setChilds(array $childs)
	{
		$this->Childs=$childs;
	}
	
	public function getHasParent()
	{
		if ($this->Parent==null) 
		{
			return false;
		}
		return true;
	}
	
	public function getHasChilds()
	{
		if ($this->Childs==null) 
		{
			return false;
		}
		return true;
	}
	
	
}

?>