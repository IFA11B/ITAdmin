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
            return;
        }
        
        /** @var User */
        $user = User::getSessionUser();
        /** @var DbConnector */
        $db = DbConnector::getInstance();
        /** @var Module */
        $modules = $db->getModules();
        
        $result['module'] = array();
        $result['moduleTitle'] = array();
        $result['moduleDescr'] = array();
        
        foreach($modules as $module)
        {
            if ($module->canRead($user))
            {
                $result['module'][] = $module->getName();
                $result['moduleTitle'][] = $module->getTitle();
                $result['moduleDescr'][] = $module->getDescription();
            }
        }
        
        return $result;
    }
}
?>