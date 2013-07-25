<?php
require_once ('DbConnector.class.php');
require_once ('Entity.iface.php');

/**
 * Singleton class for bulk data access.
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 *
 */
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
        if ($instance === null)
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
            foreach ($rows as $row)
            {
                $result[] = new Room($row);
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
            foreach ($rows as $row)
            {
                $result[] = new User($row);
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
            foreach ($rows as $row)
            {
                $result[] = new Supplier($row);
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
            foreach ($rows as $row)
            {
                switch($row[DB_COMPONENT_TYPE])
                {
                case DB_COMPONENT_TYPE_ACCESS_POINT:
                    $result[] = new AccessPoint($row);
                    break;
                    
                case DB_COMPONENT_TYPE_COMPUTER:
                    $result[] = new Computer($row);
                    break;
                
                case DB_COMPONENT_TYPE_CPU:
                    $result[] = new CPU($row);
                    break;
                
                case DB_COMPONENT_TYPE_DISK_CONTROLLER:
                    $result[] = new DiskController($row);
                    break;
                
                case DB_COMPONENT_TYPE_GRAPHICS_CARD:
                    $result[] = new GraphicCard($row);
                    break;
                
                case DB_COMPONENT_TYPE_HARD_DRIVE:
                    $result[] = new HardDrive($row);
                    break;
                
                case DB_COMPONENT_TYPE_HUB:
                    $result[] = new Hub($row);
                    break;
                
                case DB_COMPONENT_TYPE_MAINBOARD:
                    $result[] = new Mainboard($row);
                    break;
                
                case DB_COMPONENT_TYPE_NETWORK_CARD:
                    $result[] = new NetworkCard($row);
                    break;
                
                case DB_COMPONENT_TYPE_PRINTER:
                    $result[] = new Printer($row);
                    break;
                
                case DB_COMPONENT_TYPE_RAID_CONTROLLER:
                    $result[] = new RaidController($row);
                    break;
                
                case DB_COMPONENT_TYPE_RAM:
                    $result[] = new RAM($row);
                    break;
                
                case DB_COMPONENT_TYPE_ROUTER:
                    $result[] = new Router($row);
                    break;
                
                case DB_COMPONENT_TYPE_SOFTWARE:
                    $result[] = new Software($row);
                    break;
                
                case DB_COMPONENT_TYPE_SWITCH_COMPONENT:
                    $result[] = new SwitchComponent($row);
                    break;
                
                case DB_COMPONENT_TYPE_VLAN:
                    $result[] = new Vlan($row);
                    break;
                    
                default:
                    return false;
                }
            }
            
            // we need to set this now, so that getComponentById works
            $this->components = $result;
            
            foreach ($result as $component)
            {
                $rows = $db->getSubcomponentsOfComponent($component);
                if ($rows !== false)
                {
                    foreach ($rows as $row)
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
        
        while ($entity != null && $entity->getId() !== $entityId && $index < $maxLen && $index >= 0)
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
            $entity = $array[$index];
        }
        
        if ($entity->getId() == $entityId)
        {
            return null;
        }
        
        return $entity;
    }

    public function getComponentById($componentId)
    {
        return DataManagement::getEntityFromArrayById($this->getComponents(), $componentId);
    }

    public function getRoomById($roomId)
    {
        return DataManagement::getEntityFromArrayById($this->getRooms(), $roomId);
    }

    public function getSupplierById($supplierId)
    {
        return DataManagement::getEntityFromArrayById($this->getSuppliers(), $supplierId);
    }

    public function getUserById($userId)
    {
        return DataManagement::getEntityFromArrayById($this->getUsers(), $userId);
    }
}
?>
