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

    static function getName()
    {
        return Login::PAGE_NAME;
    }
    
    public function getTemplate()
    {
        return 'login.tpl';
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
                if ($user->verifyPassword($pwd))
                {
                    session_start();
                    User::setSessionUser($user);
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