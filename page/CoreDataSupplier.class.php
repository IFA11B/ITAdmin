<?php

class CoreDataSupplier implements Page
{
    function getTemplate()
    {
        return "coreDataSupplier.tpl";
    }

    function getContent()
    {
    	if(isset($_POST['save'])){
    		$this->saveSupplier();
    	}
    	
        $supplier = null;   
        $supplier = DataManagement::getInstance()->getSuppliers();
        
        
        return array(
            'suppliers' => $supplier
        );
    }
    
    static function getName()
    {
        return "Lieferanten";
    }
    
    function saveSupplier(){
    	var_dump($_POST);
    	//DbConnector::getInstance()->getSupplierById();
    }
}