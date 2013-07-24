<?php
require_once('DbConnector.class.php');
require_once('Entity.iface.php');

/**
 * Base class for all components to be managed.
 *
 * @author Deaod
 */
abstract class Component
{
	private $Id;
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
	
	public function __construct(array $row = null)
	{
	        $this->setParent(null);
        $this->clearChildren();
        
        if ($row !== null) {
            $this->setId($row[DB_COMPONENT_ID]);
            $this->setSupplier($row[DB_COMPONENT_SUPPLIER]);
            $this->setRoom($row[DB_COMPONENT_ROOM]);
            $this->setPurchaseDate($row[DB_COMPONENT_PURCHASE_DATE]);
            $this->setWarrantyPeriod($row[DB_COMPONENT_WARRANTY_PERIOD]);
            $this->setNotice($row[DB_COMPONENT_NOTICE]);
            $this->setManufacturer($row[DB_COMPONENT_MANUFACTURER]);
        }
    }
    
    public function update()
    {
        $db = DbConnector::getInstance();
        $db->updateComponent($this);
    }
    
    public function delete()
    {
        $db = DbConnector::getInstance();
        $db->deleteComponent($this);
    }
    
    public function create()
    {
        $db = DbConnector::getInstance();
        $db->createComponent($this);
    }
    
    public function copy()
    {
        $copy = new Component();

        $copy->setId($this->getId());
        $copy->setSupplier($this->getSupplier());
        $copy->setRoom($this->getRoom());
        $copy->setPurchaseDate($this->getPurchaseDate());
        $copy->setWarrantyPeriod($this->getWarrantyPeriod());
        $copy->setNotice($this->getNotice());
        $copy->setManufacturer($this->getManufacturer());
        
        foreach($children as $child)
        {
            $childCopy = $child->copy();
            
            $childCopy->setParent($copy);
            $copy->addChild($childCopy);
            
        }
        
        return $copy;
    }
	
	public function getId()
	{
		return $this->Id;
	}
	
	public function setId(int $Id)
	{
		$this->Id = $Id;
	}
	
	public function getName()
	{
		return $this->Name;
	}
	
	public function setName(string $name)
	{
		$this->Name=$name;
	}
	
	public function getManufacturer()
	{
		return $this->Manufacturer;
	}
	
	public function setManufacturer(string $manufacturer)
	{
		$this->Manufacturer=$manufacturer;
	}
	
	public function getRoom()
	{
		return $this->Room;
	}
	public function setRoom(int $room)
	{
		$this->Room=$room;
	}
	
	public function getPurchaseDate()
	{
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
		return $this->WarrantyDuration;
	}
	public function setWarrantyDuration(int $warrantyDuration)
	{
		$this->WarrantyDuration=$warrantyDuration;
	}
	
	public function getSupplier()
	{
		return $this->Supplier;
	}
	public function setSupplier(string $supplier)
	{
		$this->Supplier=$supplier;
	}
	
	public function getNote()
	{
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
	
	public function setParent(Component $parent)
	{
		$this->Parent=$parent;
	}
	
	public function getHasParent()
	{
		if ($this->Parent==null)
		{
			return false;
		}
		return true;
	}
	
	public function getChildren()
	{
		return $this->Childs;
	}
	
	public function addChild(Component $child)
	{
		$this->Childs []= $child;
	}
	
	public function getChild(int $index)
	{
		return $this->Childs[$index];
	}
	
	public function getChildrenCount()
	{
		if ($this->Childs==null) {
			return 0;
		}
		return count($this->Childs);
	}
	
	public function clearChildren()
	{
		$this->Childs = array();
	}
	
	public function setChilds(array $childs)
	{
		$this->Childs=$childs;
	}
}

?>