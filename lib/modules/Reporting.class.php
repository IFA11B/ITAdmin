<?php

class Reporting extends Module
{
    const MODULE_NAME = "REPORTING";
    const MODULE_TITLE = "Reporting";
    
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
        return "Daten werden angezeigt.";
    }
    
    public function getPage(string $page)
    {
        $pageObject = null;
        
        switch ($page)
        {
            case "Detail":
                $pageObject = new Detail();
                break;
                
            case "Main":
            default:
                $pageObject = new ReportingMain();
                break;
        }
        
        return $pageObject;
    }
}

?>