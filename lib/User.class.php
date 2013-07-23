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
    
    private function setId($id)
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
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
    
    public function getCreateDate()
    {
        return $this->createDate;
    }
    
    private function setCreateDate($createDate)
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
        
    }
    
    public function canWriteModule(int $module)
    {
        $db = DbConnector::getInstance();
        
    }
}
?>