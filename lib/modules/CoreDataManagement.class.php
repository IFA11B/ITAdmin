<?php

class CoreDataManagement extends Module
{
    const MODULE_NAME = "COREDATA";
    const MODULE_TITLE = "Stammdatenverwaltung";
    
    public function getId()
    {
        return DbConnector::getInstance()->getModuleId(CoreDataManagement::MODULE_NAME);
    }
    
    public function getName()
    {
        return CoreDataManagement::MODULE_NAME;
    }
    
    public function getTitle()
    {
        return CoreDataManagement::MODULE_TITLE;
    }
    
    public function getDescription()
    {
        // TODO change module description
        return "Stammdaten werden angezeigt.";
    }
    
    public function getPage($page)
    {
        $pageObject = null;
        
        switch ($page)
        {
            case "Detail":
                $pageObject = new Detail();
                break;
                
            case "Supplier":
               $pageObject = new CoreDataSupplier();
                break;
                
            case "Room":
                $pageObject = new CoreDataRoom();
                break;
                
            case "User":
                $pageObject = new CoreDataUser();
                break;
                
            case "Main":
            default:
                $pageObject = new CoreDataManagementMain();
                break;
        }
        
        return $pageObject;
    }
}

?>