<?php

class CoreDataRoom implements Page
{
    function getTemplate()
    {
        return "coreDataRoom.tpl";
    }

    function getContent()
    {
    	if(isset($_POST['save'])){
    		$this->saveRoom();
    	}
    	 
    	if(isset($_POST['deleteData'])){
    		$this->deleteRoom();
    	}
    	
       $rooms = null;
        
       $rooms = DataManagement::getInstance()->getRooms();
                      
        return array(
            'rooms' => $rooms
        );
    }
    
    static function getName()
    {
        return "Räume";
    }


function saveRoom(){
	
	$updateRoom = DataManagement::getInstance()->getRoomById($_POST['save']);
	if($updateRoom){
		$updateRoom->setNumber($_POST['Number']);
		$updateRoom->setNote($_POST['Note']);
		$updateRoom->setName($_POST['Name']);

		if($updateRoom->update()){
			echo 'Ihre Angaben wurden gespeichert';
		}
		else{
			echo 'Ein Fehler ist aufgetreten. Ihre Angaben konnten nicht gespeichtert werden';
		}
	}
	else{
		echo 'Der Lieferant konnte nicht gefunden werden';
		 
	}
}
}