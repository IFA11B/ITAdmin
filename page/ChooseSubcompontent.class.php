<?php
/**
 * Represents the list page.
 * Responsible for listing components.
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 * @see Page
 */
class ChooseSubcomponent implements Page
{
    /**
     * Identifying string for this page. Intended to be used in GET parameters.
     *
     * @var string
     */
    const PAGE_NAME = "chooseSubcomponent";

    static function getName()
    {
        return Choose::PAGE_NAME;
    }
    
    public function getTemplate()
    {
        return 'chooseSubcomponent.tpl';
    }

    public function getContent()
    {
        $listResult = null;
        $listType = $_POST["listType"];
        
        // Check if we need filtered or unfiltered component lists
        if(isset($_POST["filterType"]) && isset($_POST["filterValue"]))
        {
            $filterType = $_POST["filterType"];
            $filterValue = $_POST["filterValue"];
            
            $listResult = DataManagement::getInstance()->getSubcomponents($listType, $filterType, $filterValue);
        }
        else
        {
            $listResult = DataManagement::getInstance()->getSubcompontents($listType);
        }
        
        return array(
            'listResult' => $listResult
        );
    }
}

?>