<?php
/**
 * 
 * @author Deaod
 * @see Page
 */
class Login implements Page
{
    /**
     * The current cost for hashing passwords.
     * 
     * @var integer
     */
    const PASSWORD_COST = 12;
    
    /**
     * (non-PHPdoc) 
     * @see Page::getTemplate()
     */
    public function getTemplate()
    {
       return 'login.tpl'; 
    }
    
    private function checkPassword(string $user, string $pwd)
    {
        $db = DbConnector::getInstance();
        $hash = $db->getUserPassword($user);
        $rehash = password_needs_rehash($hash, PASSWORD_DEFAULT, array('cost' => Login::PASSWORD_COST));
        
        if ($hash !== false)
        {
            $success = password_verify($pwd, $hash);
        
            if ($success === true)
            {
                if ($rehash === true)
                {
                    $newHash = password_hash($pwd, PASSWORD_DEFAULT, array('cost' => Login::PASSWORD_COST));
        
                    $db->setUserPassword($user, $newHash);
                }
        
                return true;
            }
        }
        return false;
    }
    
    /**
     * (non-PHPdoc) 
     * @see Page::getContent()
     */
    public function getContent()
    {
        $result = array();
        
        if (   isset($_POST['username'])
            && isset($_POST['password']))
        {
            $user = $_POST['username'];
            $pwd = $_POST['password'];
            
            if ($user != '' && $pwd != '')
            {
                if (checkPassword($user, $pwd))
                {
                    session_start();
                    header('Location: ' . HOME_DIR . 'index.php?page=home');
                } 
                else
                {
                    $result['error'] = true;
                    return $result;
                }
            }
        }
        
        $result['error'] = false;
        return $result;
    }
}

?>