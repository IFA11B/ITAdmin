<?php
/**
 * Represents the login page.
 * Responsible for loggin in users (verification of identity), and keeping password hashes up to date.
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 * @see Page
 */
class Login implements Page
{
    /**
     * Identifying string for this page. Intended to be used in GET parameters.
     *
     * @var string
     */
    const PAGE_NAME = "LOGIN";

    public function getTemplate()
    {
        return 'login.tpl';
    }
    
    /**
     * Verifies the given password for the given user by comparing the given password against the one stored for the given user.
     *
     * @param string $userName the user to verify the password for
     * @param string $pwd the password to verify for the given user
     * @return boolean true if verification succeeded, false otherwise
     */
    private function checkPassword(string $userName, string $pwd)
    {
        $db = DbConnector::getInstance();
        $user = User::getUserFromName($userName);
        $hash = $user->getPassword();
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

    public function getContent()
    {
        $result = array();
        
        if (isset($_POST['username']) && isset($_POST['password']))
        {
            $userName = $_POST['username'];
            $pwd = $_POST['password'];
            
            if ($userName != '' && $pwd != '')
            {
                $user = User::getUserFromName($userName);
                if (checkPassword($userName, $pwd))
                {
                    session_start();
                    User::setSessionUser(User::getUserFromName($userName));
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