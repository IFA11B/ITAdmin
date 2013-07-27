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
              
       $var = array(
            'users' => $users,
       		'modules' =>$modules
        );
       
       
        return $var;
    }
    
    static function getName()
    {
        return "Benutzer";
    }
}