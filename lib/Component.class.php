<?php

abstract class Component
{
    private $parent;
    private $children;
    
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
    
    public function __construct(array $row = null)
    {
        
    }
}
?>