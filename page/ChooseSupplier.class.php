<?php
/**
 * Represents the list page.
 * Responsible for listing components.
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 * @see Page
 */
class Choose implements Page
{
    /**
     * Identifying string for this page. Intended to be used in GET parameters.
     *
     * @var string
     */
    const PAGE_NAME = "choose";

    static function getName()
    {
        return Choose::PAGE_NAME;
    }
    
    public function getTemplate()
    {
        return 'choose.tpl';
    }

    public function getContent()
    {
    	$listType = null;
        $listResult = null;
        
        if(isset($_POST["listType"]))
        {
        	$listType = $_POST["listType"];
        }else
        {
        	die();
        }
        
        // Check if we need filtered or unfiltered component lists
        if(isset($_POST["filterType"]) && isset($_POST["filterValue"]))
        {
            $filterType = $_POST["filterType"];
            $filterValue = $_POST["filterValue"];
            
            
            $listResult = DataManagement::getInstance()->getHardwareComponents($filterType, $filterValue);
        }
        else
        {
            $listResult = DataManagement::getInstance()->getHardwareComponents();
        }
        
        return array(
            'listResult' => $listResult
        );
    }
}

?>