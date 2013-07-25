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
        return PAGE_NAME;
    }
    
    public function getTemplate()
    {
        return 'home.tpl';
    }

    public function getContent()
    {
        $result = array();
        
        if (User::isLoggedIn() === true)
        {
            $user = User::getSessionUser();
            
            $result['userRole'] = $user->getName();
        }
        else
        {
            //header('Location: ');
        }
        
        return $result;
    }
}

?>