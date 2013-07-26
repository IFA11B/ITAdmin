<?php

class CoreDataUser implements Page
{
    function getTemplate()
    {
        return "coreDataUser.tpl";
    }

    function getContent()
    {
        $users = null;
        

       $users = DataManagement::getInstance()->getUsers();
       $modules = DataManagement::getInstance()->getModules();
        
        return array(
            'users' => $users
        );
    }
    
    static function getName()
    {
        return "Benutzer";
    }
}