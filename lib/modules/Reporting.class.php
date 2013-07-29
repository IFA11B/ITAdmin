<?php

class Reporting extends Module
{
    const MODULE_NAME = "REPORTING";
    const MODULE_TITLE = "Reporting";
    
    public function getId()
    {
        return DbConnector::getInstance()->getModuleId(Reporting::MODULE_NAME);
    }
    
    public function getName()
    {
        return Reporting::MODULE_NAME;
    }
    
    public function getTitle()
    {
        return Reporting::MODULE_TITLE;
    }
    
    public function getDescription()
    {
        // TODO change module description
        return "Daten werden angezeigt.";
    }
    
    public function getPage($page)
    {
        $pageObject = null;
        
        switch ($page)
        {
            case "Detail":
                $pageObject = new Detail();
                break;
                
            case "Network":
                $pageObject = new ReportingNetwork();
                break;
                
            case "Software":
                $pageObject = new ReportingSoftware();
                break;
                
            case "Hardware":
                $pageObject = new ReportingHardware();
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