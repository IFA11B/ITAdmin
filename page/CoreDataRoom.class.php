<?php

class CoreDataRoom implements Page
{
    function getTemplate()
    {
        return "coreDataRoom.tpl";
    }

    function getContent()
    {
        $rooms = null;
        

       $rooms = DataManagement::getInstance()->getRooms();
       
       var_dump($rooms);
               
        return array(
            'rooms' => $rooms
        );
    }
    
    static function getName()
    {
        return "Räume";
    }
}