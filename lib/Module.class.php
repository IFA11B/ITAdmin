<?php
require_once('Page.iface.php');
require_once('User.class.php');
require_once('DbConnector.class.php');

/**
 * Base class for modules. Provides access management.
 * 
 * @author deaod
 */
abstract class Module implements Page
{
    public abstract function getId();
    
    public abstract function getName();
    
    public abstract function getTitle();
    
    public abstract function getDescription();
    
    public abstract function getPage(string $module, string $page);
    
    public function canRead(User $user)
    {
        $db = DbConnector::getInstance();
        $result = $db->userModuleRead($user->getId(), $this->getId());
        
        if ($result === 1)
        {
            return true;
        }
        return false;
    }
    
    public function canWrite(User $user)
    {
        $db = DbConnector::getInstance();
        $result = $db->userModuleWrite($user->getId(), $this->getId());
        
        if ($result === 1)
        {
            return true;
        }
        return false;
    }
}
?>