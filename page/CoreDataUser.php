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
        
       foreach($users As $user){
       		$returnUsers['Name'] = $user->getName();
       		foreach($modules As $module){
       			$returnUsers['module']['Name'] = $module->getName();
       			$returnUsers['module']['Right'] = $user->canReadModule($module);
       		}
       }
       
        return array(
            'users' => $returnUsers
        );
    }
    
    static function getName()
    {
        return "Benutzer";
    }
}