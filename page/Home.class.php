<?php
/**
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 * @see Page
 */
class Home implements Page
{
    
    const PAGE_NAME = 'home';
    
    static function getName()
    {
        return Home::PAGE_NAME;
    }
    
    public function getTemplate()
    {
        return 'home.tpl';
    }

    public function getContent()
    {
        session_start();
        $result = array();
        
        if (User::isLoggedIn() === true)
        {
            $navbar = new Navbar();
            
            $user = User::getSessionUser();
            
            $result = array_merge($result, $navbar->getContent());
            $result['userRole'] = $user->getName();
        }
        else
        {
            session_destroy();
            //header('Location: ');
        }
        
        return $result;
    }
}

?>