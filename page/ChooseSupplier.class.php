<?php
/**
 * Represents the list page.
 * Responsible for listing components.
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 * @see Page
 */
class ChooseSupplier implements Page
{
    /**
     * Identifying string for this page. Intended to be used in GET parameters.
     *
     * @var string
     */
    const PAGE_NAME = "chooseSupplier";

    static function getName()
    {
        return ChooseSupplier::PAGE_NAME;
    }
    
    public function getTemplate()
    {
        return 'chooseSupplier.tpl';
    }

	public function getContent()
    {
        $listResult = null;
        
        // Check if we need filtered or unfiltered component lists
        if(isset($_POST["filterType"]) && isset($_POST["filterValue"]))
        {
            $filterType = $_POST["filterType"];
            $filterValue = $_POST["filterValue"];
            
            //TODO: change getHardwareComponents() to getSuppliers()
            $listResult = DataManagement::getInstance()->getHardwareComponents($filterType, $filterValue);
        }
        else
        {
            //TODO: change getHardwareComponents() to getSuppliers()
            $listResult = DataManagement::getInstance()->getHardwareComponents();
        }
        
        return array(
            'listResult' => $listResult
        );
    }
}

?>