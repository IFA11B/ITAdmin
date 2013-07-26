<?php

/**
 * Base class for all components to be managed.
 *
 * @author 
 */
abstract class Component
{
	private $Id;
	private $ComponentType;
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
        
        if ($row != null) {
            $this->setId($row[DB_COMPONENT_ID]);
            $this->setName($row[DB_COMPONENT_NAME]);
            $this->setComponentType($row[DB_COMPONENT_TYPE]);
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
    
    public function copyBase($TargetComponent)
    {
        $TargetComponent->setId($this->getId());
        $TargetComponent->setComponentType($this->getComponentType());
        $TargetComponent->setSupplier($this->getSupplier());
        $TargetComponent->setRoom($this->getRoom());
        $TargetComponent->setPurchaseDate($this->getPurchaseDate());
        $TargetComponent->setWarrantyPeriod($this->getWarrantyPeriod());
        $TargetComponent->setNotice($this->getNotice());
        $TargetComponent->setManufacturer($this->getManufacturer());
        $TargetComponent->setChilds($this->getChildren());
        $TargetComponent->setParent($this->getParent());
        return $TargetComponent;
    }
    
	public function getId()
	{
		return $this->Id;
	}
	
	public function setId($Id)
	{
		$this->Id = $Id;
	}
	
	public function getComponentType()
	{
		return $this->ComponentType;
	}
	
	public function setComponentType($componentType)
	{
		$this->ComponentType=$componentType;
	}
	
	public function getName()
	{
		return $this->Name;
	}
	
	public function setName($name)
	{
		$this->Name=$name;
	}
	
	public function getManufacturer()
	{
		return $this->Manufacturer;
	}
	
	public function setManufacturer($manufacturer)
	{
		$this->Manufacturer=$manufacturer;
	}
	
	public function getRoom()
	{
		return $this->Room;
	}
	public function setRoom($room)
	{
		$this->Room=$room;
	}
	
	public function getPurchaseDate()
	{
		return $this->PurchaseDate;
	}
	public function setPurchaseDate($purchaseDate)
	{
		$this->PurchaseDate=$purchaseDate;
	}
	
	public function getWarrantyDuration()
	{
		return $this->WarrantyDuration;
	}
	public function setWarrantyDuration($warrantyDuration)
	{
		$this->WarrantyDuration=$warrantyDuration;
	}
	
	public function getSupplier()
	{
		return $this->Supplier;
	}
	public function setSupplier($supplier)
	{
		$this->Supplier=$supplier;
	}
	
	public function getNote()
	{
		return $this->Note;
	}
	public function setNote($note)
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
	
	public function getChilds()
	{
		return $this->Childs;
	}
	
	public function addChild(Component $child)
	{
		$this->Childs []= $child;
		
	}
	
	public function getChild($index)
	{
		return $this->Childs[$index];
	}
	
	public function getChildsCount()
	{
		if ($this->Childs==null) {
			return 0;
		}
		return count($this->Childs);
	}
	
	public function clearChilds()
	{
		$this->Childs = array();
	}
	
	public function setChilds(array $childs)
	{
		$this->Childs=$childs;
	}
	
	public function assignChilds(array $childs)
	{
		foreach ($childs as $child)
		{
			$child->Parent=$this;
			$child->update();
		}
	}
	
	public function assignParent($Parent)
	{
		$this->Parent=$Parent;
		$this->update();
	}
}

?>