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
        	$listType = $_POST["listType"];
        }else
        {
        	die();
        }
        
        switch ($listType)
        {
        	case "maincomponent":
        		
        		break;
        	case "supplier":
        		break;
        	case "room":
        		break;
        	default:
        	case "subcomponent":
        		new ChooseSubcomponent();
        		break;
        }
    }
}

?>