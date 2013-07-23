<?php
require_once('Entity.iface.php');
require_once('DbConnector.class.php');

class User implements Entity
{
    private $id;
    private $name;
    private $password;
    private $createDate;
    
    public function getId()
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
    }
    public function getCreateDate()
    {
        return $this->createDate;
    }
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }
    
    public function __construct(array $row = null)
    {
        if ($row != null) {
            setId($row[DB_USER_ID]);
            setName($row[DB_USER_NAME]);
            setPassword($row[DB_USER_PWD]);
            setCreateDate($row[DB_USER_CREATE_DATE]);
        }
    }
    
    public function canReadModule(int $module)
    {
        $db = DbConnector::getInstance();
        $result = $db->userModuleRead($this->getId(), $module);
        
        if ($result === 1)
        {
            return true;
        }
        return false;
    }
    
    public function canWriteModule(int $module)
    {
        $db = DbConnector::getInstance();
        $result = $db->userModuleWrite($this->getId(), $module);
        
        if ($result === 1)
        {
            return true;
        }
        return false;
    }
    
    public function update()
    {
        $db = DbConnector::getInstance();
        $db->updateUser($this);
    }
    
    public function delete()
    {
        $db = DbConnector::getInstance();
        $db->deleteUser($this);
    }
    
    public function create()
    {
        $db = DbConnector::getInstance();
        $db->createUser($this);
    }
    
    public function copy()
    {
        $copy = new User();
        
        $copy->setId($this->getId());
        $copy->setName($this->getName());
        $copy->setPassword($this->getPassword());
        $copy->setCreateDate($this->getCreateDate());
        
        return $copy;
    }
}
?>