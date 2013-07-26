<?php
/**
 * Represents the list page.
 * Responsible for listing components.
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 * @see Page
 */
class ChooseMaincomponent implements Page
{
    /**
     * Identifying string for this page. Intended to be used in GET parameters.
     *
     * @var string
     */
    const PAGE_NAME = "chooseMaincomponent";

    static function getName()
    {
        return ChooseMaincomponent::PAGE_NAME;
    }
    
    public function getTemplate()
    {
        return 'chooseMaincompontent.tpl';
    }

    public function getContent()
    {
        $listResult = null;
        
        // Check if we need filtered or unfiltered component lists
        if(isset($_POST["filterType"]) && isset($_POST["filterValue"]))
        {
            $filterType = $_POST["filterType"];
            $filterValue = $_POST["filterValue"];
            
            //TODO: change getHardwareComponents() to getMaincomponents()
            $listResult = DataManagement::getInstance()->getHardwareComponents($filterType, $filterValue);
        }
        else
        {
            //TODO: change getHardwareComponents() to getMaincomponents()
            $listResult = DataManagement::getInstance()->getHardwareComponents();
        }
        
        return array(
            'listResult' => $listResult
        );
    }
}

?>