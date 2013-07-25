<?php
/**
 *
 */
/**
 * Represents a single user, as stored in the database.
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 */
class User implements Entity
{
    /**
     * The string by which a user is identified in the session.
     *
     * @var string
     */
    const SESSION_USER = 'USER';
    
    /**
     * Unique integer assigned to a user.
     *
     * @var int
     */
    private $id;
    
    /**
     * Unique name of this user.
     *
     * @var string
     */
    private $name;
    
    /**
     * Hashed version of the password.
     *
     * @var string
     */
    private $password;
    
    /**
     * Date the user was created on.
     *
     * @var date
     */
    private $createDate;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
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

    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    public function __construct(array $row = null)
    {
        if ($row != null)
        {
            setId($row[DB_USER_ID]);
            setName($row[DB_USER_NAME]);
            setPassword($row[DB_USER_PWD]);
            setCreateDate($row[DB_USER_CREATE_DATE]);
        }
    }

    public function canReadModule($module)
    {
        $result = DbConnector::getInstance()->userModuleRead($this->getId(), $module);
        
        if ($result === 1)
        {
            return true;
        }
        return false;
    }

    public function canWriteModule($module)
    {
        $result = DbConnector::getInstance()->userModuleWrite($this->getId(), $module);
        
        if ($result === 1)
        {
            return true;
        }
        return false;
    }

    public function update()
    {
        DbConnector::getInstance()->updateUser($this);
    }

    public function delete()
    {
        DbConnector::getInstance()->deleteUser($this);
    }

    public function create()
    {
        DbConnector::getInstance()->createUser($this);
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

    public static function getSessionUser()
    {
        $user = $_SESSION[Login::SESSION_USER];
        
        if ($user == null)
        {
            return false;
        }
        
        return $user;
    }

    public static function setSessionUser(User $user)
    {
        $_SESSION[Login::SESSION_USER] = $user;
    }

    public static function isLoggedIn()
    {
        return User::getSessionUser() !== false;
    }
}
?>