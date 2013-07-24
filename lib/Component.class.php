<?php
require_once('DbConnector.class.php');
require_once('Entity.iface.php');

/**
 * 
 * @author deaod
 *
 */
abstract class Component implements Entity
{
    private $id;
    private $supplier;
    private $room;
    private $purchaseDate;
    private $warrantyPeriod;
    private $notice;
    private $manufacturer;
    
    public function getId()
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getSupplier()
    {
        return $this->supplier;
    }
    public function setSupplier(int $supplier)
    {
        $this->supplier = $supplier;
    }
    public function getRoom()
    {
        return $this->room;
    }
    public function setRoom(int $room)
    {
        $this->room = $room;
    }
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }
    public function setPurchaseDate(int $purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;
    }
    public function getWarrantyPeriod()
    {
        return $this->warrantyPeriod;
    }
    public function setWarrantyPeriod(int $warrantyPeriod)
    {
        $this->warrantyPeriod = $warrantyPeriod;
    }
    public function getNotice()
    {
        return $this->notice;
    }
    public function setNotice(string $notice)
    {
        $this->notice = $notice;
    }
    public function getManufacturer()
    {
        return $this->manufacturer;
    }
    public function setManufacturer(string $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }
    
    private $parent;
    private $children;
    
    public function getParent()
    {
        return $this->parent;
    }
    public function setParent(Component $parent)
    {
       $this->parent = $parent;
    }
    public function getChildren()
    {
        return $this->children;
    }
    public function addChild(Component $child)
    {
        $this->children []= $child;
    }
    public function getChild(int $index)
    {
        return $this->children[$index];
    }
    public function getChildrenCount()
    {
        return count($this->children);
    }
    public function clearChildren()
    {
        $this->children = array();
    }
    
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
}
?>