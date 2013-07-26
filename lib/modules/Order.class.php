<?php

class Order extends Module
{
    const MODULE_NAME = "ORDER";
    const MODULE_TITLE = "Bestellung";
    
    public function getId()
    {
        return DbConnector::getInstance()->getModuleId(MODULE_NAME);
    }
    
    public function getName()
    {
        return MODULE_NAME;
    }
    
    public function getTitle()
    {
        return MODULE_TITLE;
    }
    
    public function getDescription()
    {
        // TODO change module description
        return "Bestellungen anlegen.";
    }
    
    public function getPage($page)
    {
        $pageObject = null;
        
        switch ($page)
        {
            case "Detail":
                $pageObject = new Detail();
                break;
                
            case "Main":
            default:
                $pageObject = new OrderMain();
                break;
        }
        
        return $pageObject;
    }
}

?>