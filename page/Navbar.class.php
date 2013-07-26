<?php

class Navbar implements Page
{
    const PAGE_NAME = 'navbar';
    
    public static function getName()
    {
        return Navbar::PAGE_NAME;
    }
    
    public function getTemplate()
    {
        return 'navbar.tpl';
    }
    
    public function getContent()
    {
        $result = array();
        
        if (User::isLoggedIn() !== true) 
        {
            $result['error'] = 'notLoggedIn';
            //header('Location: <https>');
            return;
        }
        
        /** @var User */
        $user = User::getSessionUser();
        /** @var DbConnector */
        $db = DbConnector::getInstance();
        /** @var Module */
        $modules = $db->getModules();
        
        $result['modules'] = array();
        
        foreach($modules as $module)
        {
            $modResult = array();
            if ($module->canRead($user))
            {
                $modResult['name'] = $module->getName();
                $modResult['title'] = $module->getTitle();
                $modResult['descr'] = $module->getDescription();
            }
            $result['modules'][] = $modResult;
        }
        
        return $result;
    }
}
?>