<?php

class CoreDataUser implements Page
{
    function getTemplate()
    {
        return "coreDataUser.tpl";
    }

    function getContent()
    {
    	if(isset($_POST['save'])){
    		$this->saveUser();
    	}
    	 
    	if(isset($_POST['delete'])){
    		$this->deleteUser();
    	}
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
    
    function saveUser(){
    
    	$updeteUser = DataManagement::getInstance()->getUserById($_POST['save']);

    
    	if($updeteUser->update()){
    		echo 'Ihre Angaben wurden gespeichert';
    	}
    	else{
    		echo 'Ein Fehler ist aufgetreten. Ihre Angaben konnten nicht gespeichtert werden';
    	}
    }
    
    function deleteUser(){
    	$deleteUser = DataManagement::getInstance()->getUserById($_POST['delete']);
    	$deleteUser->delete();
    }
}