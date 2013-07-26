<?php

/**
 * Base class for all components to be managed.
 *
 * @author SeiresS <keckchris@web.de>
 */
 
abstract class Component
{
	private $id;
	private $componentType;
	private $name;
	private $manufacturer;
	private $room;
	private $purchaseDate;
	private $warrantyDuration;
	private $supplier;
	private $note;
	
	private $parent;
	private $children;
	
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
    
    public function copy(Component $copy = null)
    {
        if ($copy !== null) {
            $copy->setId($this->getId());
            $copy->setComponentType($this->getComponentType());
            $copy->setSupplier($this->getSupplier());
            $copy->setRoom($this->getRoom());
            $copy->setPurchaseDate($this->getPurchaseDate());
            $copy->setWarrantyPeriod($this->getWarrantyPeriod());
            $copy->setNotice($this->getNotice());
            $copy->setManufacturer($this->getManufacturer());
            $copy->setChildren($this->getChildren());
            $copy->setParent($this->getParent());
        }
    }
    
    public function update()
    {
        DbConnector::getInstance()->updateComponent($this);
    }
    
    public function delete()
    {
        DbConnector::getInstance()->deleteComponent($this);
    }
    
    public function create()
    {
        DbConnector::getInstance()->createComponent($this);
    }
    
    public static function getClassName() {
        return get_called_class();
    }
    
    public function getFields() {
        $result = array();
        
        $result[] = array(
            'name' => 'ID',
            'type' => 'number',
            'value' => $this->getId());
        
        $result[] = array(
            'name' => 'Name',
            'type' => 'string',
            'value' => $this->getName());
        
        $result[] = array(
            'name' => 'Art',
            'type' => 'string',
            'value' => $this->getComponentType());
        
        $result[] = array(
            'name' => 'Hersteller',
            'type' => 'string',
            'value' => $this->getManufacturer());
        
        $result[] = array(
            'name' => 'Raum',
            'type' => 'string',
            'value' => $this->getRoom());
        
        $result[] = array(
            'name' => 'Kaufdatum',
            'type' => 'date',
            'value' => $this->getPurchaseDate());
        
        $result[] = array(
            'name' => 'Garantie',
            'type' => 'number',
            'value' => $this->getWarrantyDuration());
        
        $result[] = array(
            'name' => 'Lieferer',
            'type' => 'string',
            'value' => $this->getSupplier());
        
        $result[] = array(
            'name' => 'Notiz',
            'type' => 'text',
            'value' => $this->getNote());
        
        return $result;
    }
    
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
	}
	
	public function getComponentType()
	{
		return $this->componentType;
	}
	
	public function setComponentType($componentType)
	{
		$this->componentType=$componentType;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name=$name;
	}
	
	public function getManufacturer()
	{
		return $this->manufacturer;
	}
	
	public function setManufacturer($manufacturer)
	{
		$this->manufacturer=$manufacturer;
	}
	
	public function getRoom()
	{
		return $this->room;
	}
	public function setRoom($room)
	{
		$this->room=$room;
	}
	
	public function getPurchaseDate()
	{
		return $this->purchaseDate;
	}
	public function setPurchaseDate($purchaseDate)
	{
		$this->purchaseDate=$purchaseDate;
	}
	
	public function getWarrantyDuration()
	{
		return $this->warrantyDuration;
	}
	public function setWarrantyDuration($warrantyDuration)
	{
		$this->warrantyDuration=$warrantyDuration;
	}
	
	public function getSupplier()
	{
		return $this->supplier;
	}
	public function setSupplier($supplier)
	{
		$this->supplier=$supplier;
	}
	
	public function getNote()
	{
		return $this->note;
	}
	public function setNote($note)
	{
		$this->note=$note;
	}
	
	public function getParent()
	{
		return $this->parent; 
	}
	
	public function setParent(Component $parent = null)
	{
		$this->parent=$parent;
	}
	
	public function getHasParent()
	{
		if ($this->parent==null)
		{
			return false;
		}
		return true;
	}
	
	public function getChilds()
	{
		return $this->childs;
	}
	
	public function addChild(Component $child)
	{
		$this->children []= $child;
		
	}
	
	public function getChild($index)
	{
		return $this->children[$index];
	}
	
	public function getChildrenCount()
	{
		if ($this->children == null) {
			return 0;
		}
		return count($this->children);
	}
	
	public function clearChildren()
	{
		$this->children = array();
	}
	
	public function setChildren(array $children)
	{
		$this->children = $children;
	}
}
