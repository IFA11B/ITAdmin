<?php
require_once('DbConnector.class.php');
require_once('Entity.iface.php');
require_once('Component.class.php');

class DataManagement
{
    private $rooms;
    private $suppliers;
    private $components;
    private $users;
    
    private function __construct()
    {
        $this->rooms = null;
        $this->suppliers = null;
        $this->components = null;
        $this->users = null;
    }
    
    public static function getInstance()
    {
        static $instance = null;
        if($instance === null)
        {
            $instance = new DataManagement();
        }
        
        return $instance;
    }
    
    public function getRooms()
    {
        if ($this->rooms !== null)
        {
            return $this->rooms;
        }
        
        $result = array();
        $rows = DbConnector::getInstance()->getAllRooms();
        
        if ($rows !== false)
        {
            foreach($rows as $row)
            {
                $result []= new Room($row);
            }
            
            $this->rooms = $result;
            return $result;
        }
        return false;
    }
    
    public function getUsers()
    {
        if ($this->users !== null)
        {
            return $this->users;
        }
        
        $result = array();
        $rows = DbConnector::getInstance()->getAllUsers();
    
        if ($rows !== false)
        {
            foreach($rows as $row)
            {
                $result []= new User($row);
            }
            
            $this->users = $result;
            return $result;
        }
        return false;
    }
    
    public function getSuppliers()
    {
        if ($this->suppliers !== null)
        {
            return $this->suppliers;
        }
        
        $result = array();
        $rows = DbConnector::getInstance()->getAllSuppliers();
        
        if ($rows !== false)
        {
            foreach($rows as $row)
            {
                $result []= new Supplier($row);
            }
            
            $this->suppliers = $result;
            return $result;
        }
        return false;
    }
    
    public function getComponents()
    {
        if ($this->components !== null)
        {
            return $this->components;
        }
        
        $result = array();
        $rows = DbConnector::getInstance()->getAllComponents();
    
        if ($rows !== false)
        {
            foreach($rows as $row)
            {
                switch($row[DB_COMPONENT_TYPE])
                {
                    case DB_COMPONENT_TYPE_PC:
                        $result []= new ComPC($row);
                        break;
                    case DB_COMPONENT_TYPE_MAINBOARD:
                        $result []= new ComMainboard($row);
                        break;
                    case DB_COMPONENT_TYPE_MEMORY:
                        $result []= new ComMemory($row);
                        break;
                        // ...
                        // add as needed
                        // need to talk to DB about it again
                    default:
                        return false;
                }
            }
            
            // we need to set this now, so that getComponentById works
            $this->components = $result;
            
            foreach($result as $component)
            {
                $rows = $db->getSubcomponentsOfComponent($component->getId());
                if ($rows !== false)
                {
                    foreach($rows as $row)
                    {
                        $subcomponent = $this->getComponentById($row);
                        
                        $subcomponent->setParent($component);
                        $component->addChild($subcomponent);
                    }
                }
                else
                {
                    // there was an error querying the DB
                    // reset this to keep the object in a valid state
                    $this->components = null;
                    return false;   
                }
            }
            
            return $result;
        }
        return false;
    }
    
    private static function getEntityFromArrayById(array $array, int $entityId)
    {
        // binary search because we're awesome
        
        $maxLen = count($array);
        $len = $maxLen - 1;
        $index = 0;
        $entity = $array[$index];
        
        while($entity->getId() !== $entityId)
        {
            if ($entity->getId() > $entityId)
            {
                $index -= $len;
            }
            elseif ($entity->getId() < $entityId)
            {
                $index += $len;
            }
            $len = ($len + 1) / 2;
        }
        
        return $entity;
    }
    
    public function getComponentById(int $componentId)
    {
        return DataManagement::getEntityFromArrayById($this->components, $componentId);
    }
    
    public function getRoomById(int $roomId)
    {
        return DataManagement::getEntityFromArrayById($this->rooms, $roomId);
    }
    
    public function getSupplierById(int $supplierId)
    {
        return DataManagement::getEntityFromArrayById($this->suppliers, $supplierId);
    }
    
    public function getUserById(int $userId)
    {
        return DataManagement::getEntityFromArrayById($this->users, $userId);
    }
    
}
?>