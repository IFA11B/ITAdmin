<?php
/**
 * Represents the list page.
 * Responsible for listing components.
 *
 * @author Silas Heck <silas-heck@arcor.de>
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
            
            $listResult = DataManagement::getInstance()->getMainomponents($filterType, $filterValue);
        }
        else
        {
            $listResult = DataManagement::getInstance()->getMaincomponents();
        }
        
        return array(
            'listResult' => $listResult
        );
    }
}

?>