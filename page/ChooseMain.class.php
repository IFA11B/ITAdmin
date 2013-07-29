<?php
/**
 * Represents the list page.
 * Responsible for listing components.
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 * @see Page
 */
class ChooseMain implements Page
{
    /**
     * Identifying string for this page. Intended to be used in GET parameters.
     *
     * @var string
     */
    const PAGE_NAME = "chooseMain";

    static function getName()
    {
        return ChooseMain::PAGE_NAME;
    }
    
    public function getTemplate()
    {
    	// $listType:
    	// - "maincomponent"  lists all maincomponents
    	// - "supplier" list all suppliers
    	// - "room" lists all rooms
    	// - "subcomponent" lists all subcomponents
    	// - "stock" lists all subcomponents out of stock (room = stock)
    	// - "(ID of a maincomponent)" list all subcomponents that are contained
    	//								in the maincomponent with the specialised ID
    	$listType = null;
        
        if(isset($_POST["listType"]))
        {
	        $return = null;
	        switch ($_POST["listType"])
	        {
	        	case "maincomponent":
	        		$return = 'chooseMaincomponent.tpl';
	        		break;
	        	case "supplier":
	        		$return = "chooseSupplier.tpl";
	        		break;
	        	case "room":
	        		$return = "chooseRoom.tpl";
	        		break;
	        	default:
	        	case "subcomponent":
	        		$return = "chooseSubcomponent.tpl";
	        		break;
	        }
	        return $return;
        }
        else
        {
        	die();
        }
    }

    public function getContent()
    {
    	// $listType:
    	// - "maincomponent"  lists all maincomponents
    	// - "supplier" list all suppliers
    	// - "room" lists all rooms
    	// - "subcomponent" lists all subcomponents
    	// - "stock" lists all subcomponents out of stock (room = stock)
    	// - "(ID of a maincomponent)" list all subcomponents that are contained
    	//								in the maincomponent with the specialised ID
    	$listType = null;
        
        if(isset($_POST["listType"]))
        {
	        $return = null;
	        switch ($_POST["listType"])
	        {
	        	case "maincomponent":
	        		$return = $this->getMainComponentContent();
	        		break;
	        	case "supplier":
	        		$return = $this->getSupplierContent();
	        		break;
	        	case "room":
	        		$return = $this->getRoomContent();;
	        		break;
	        	default:
	        	case "subcomponent":
	        		$return = $this->getSubcomponentContent();;
	        		break;
	        }
	        return $return;
        }
        else
        {
        	die();
        }    
    }
    
    private function getMainComponentContent()
    {
        $listResult = null;
        
        // Check if we need filtered or unfiltered component lists
        if(isset($_POST["filterType"]) && isset($_POST["filterValue"]))
        {
            $filterType = $_POST["filterType"];
            $filterValue = $_POST["filterValue"];
        
            $listResult = DataManagement::getInstance()->getMaincomponents($filterType, $filterValue);
        }
        else
        {
            $listResult = DataManagement::getInstance()->getMaincomponents();
        }
        
        return array(
                'listResult' => $listResult
        );
    }
    
    private function getSupplierContent()
    {
        $listResult = null;
        
        // Check if we need filtered or unfiltered component lists
        if(isset($_POST["filterType"]) && isset($_POST["filterValue"]))
        {
            $filterType = $_POST["filterType"];
            $filterValue = $_POST["filterValue"];
        
            $listResult = DataManagement::getInstance()->getMaincomponents($filterType, $filterValue);
        }
        else
        {
            $listResult = DataManagement::getInstance()->getMaincomponents();
        }
        
        return array(
                'listResult' => $listResult
        );
    }
    
    private function getRoomContent()
    {
        
    }
    
    private function getSubcomponentContent()
    {
        
    }
}

?>