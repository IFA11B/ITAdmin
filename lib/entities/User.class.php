<?php
/**
 * Represents a single user, as stored in the database.
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 */
class User implements Entity
{
    /**
     * The current cost for hashing passwords.
     *
     * @var integer
     */
    const PASSWORD_COST = 12;
    
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
    private $id = false;
    
    /**
     * Unique name of this user.
     *
     * @var string
     */
    private $name = false;
    
    /**
     * Hashed version of the password.
     *
     * @var string
     */
    private $password = false;
    
    /**
     * Date the user was created on.
     *
     * @var date
     */
    private $createDate = false;

    public function getId()
    {
        return $this->id;
    }

    /**
     * Changes the primary key of this user.
     * I dont expect anyone to have a use for this, but its here for symmetry.
     *
     * @param int $id the new primary key.
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns the name of this user.
     *
     * @return string current name of the user.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Changes the name of the user.
     * Be sure to check whether a user with the new name doesnt already exist beforehand, as it will only fail once you
     * commit the changes to the database using User::update().
     *
     * @param string $name new name of the user.
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the current password (hashed) of this user.
     *
     * @return (string) the password of this user.
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Changes the password of this user to the one specified.
     * Make sure you hash it using password_hash() first and only pass the hashed version to this function.
     *
     * @param string $password new password for this user.
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Returns the date this user was created on, formatted as YYYY-MM-DD.
     *
     * @return (string) the date this user was created on.
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Changes the date this user was created on.
     * Only here for symmetry.
     *
     * @param string $createDate the new date.
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    }

    function __construct(array $row = null)
    {
        if ($row != null)
        {
            $this->setId($row[DB_USER_ID]);
            $this->setName($row[DB_USER_NAME]);
            $this->setPassword($row[DB_USER_PWD]);
            $this->setCreateDate($row[DB_USER_CREATE_DATE]);
        }
    }

    /**
     * Returns whether this user has read access to the specified module.
     * If he doesnt, he should be kept in ignorance of this module (that means dont even even display whether its
     * there).
     *
     * @param int $module the module you want to check read rights for.
     * @return (boolean) true if this user has read access, false if he doesnt.
     */
    public function canReadModule($module)
    {
        $result = DbConnector::getInstance()->userModuleRead($this, $module);
        
        if ($result && $result[DB_USER_PRIV_READ] === 1)
        {
            return true;
        }
        return false;
    }

    /**
     * Returns whether this user has write access to the specified module.
     * If he doesnt, he should not be able to modify the database through this module in any way.
     *
     * @param int $module the module you want to check write rights for.
     * @return (boolean) true if this user has write access, false if he doesnt.
     */
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
    
    /**
     * Verifies this users password against the specified password
     *
     * @param string $password
     * @return boolean
     */
    public function verifyPassword($password) {
        $hash = $this->getPassword();
        $rehash = password_needs_rehash($hash, PASSWORD_DEFAULT, array('cost' => User::PASSWORD_COST));
        
        if ($hash !== false)
        {
            $success = password_verify($password, $hash);
        
            if ($success === true)
            {
                if ($rehash === true)
                {
                    $newHash = password_hash($password, PASSWORD_DEFAULT, array('cost' => User::PASSWORD_COST));
        
                    $user->setPassword($newHash);
                    $user->update();
                }
        
                return true;
            }
        }
        return false;
    }

    /**
     * Returns the User instance whose name matches the specified name.
     *
     * @param string $userName the name of the desired user.
     * @return (User &#124; boolean) a valid User instance, false otherwise;
     */
    public static function getUserFromName($userName)
    {
    	return DbConnector::getInstance()->getUserByName($userName);
    }

    /**
     * Returns the User instance were currently operating under or false if we are not logged in.
     *
     * @return (User &#124; boolean) the User that is currently logged in, or false if we are not logged in.
     */
    public static function getSessionUser()
    {
        if (isset($_SESSION[User::SESSION_USER]))
        {
            $user = $_SESSION[User::SESSION_USER];
            
            if ($user != null)
            {
                return $user;
            }
        }
        return false;
    }

    /**
     * Changes the user we are currently logged in as.
     * Make sure you verify the password first.
     *
     * @param User $user the new user to be logged in as.
     */
    public static function setSessionUser(User $user)
    {
        $_SESSION[User::SESSION_USER] = $user;
    }

    /**
     * Returns whether or not we are currently logged in as any user.
     *
     * @return (boolean) true if were logged in, false otherwise.
     */
    public static function isLoggedIn()
    {
        return User::getSessionUser() != false;
    }
}
?>
