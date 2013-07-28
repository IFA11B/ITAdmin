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
    	
    	if(isset($_POST['deleteData'])){
    		$this->deleteSupplier();
    	}
    	if(isset($_POST['addSupplier'])){
    		$this->addSupplier();
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
    
    	$updeteSupplier = DataManagement::getInstance()->getSupplierById($_POST['save']);
    	if($updeteSupplier){
    		$updeteSupplier->setStreet($_POST['Street']);
        	$updeteSupplier->setZipcode($_POST['Zipcode']);
       	 	$updeteSupplier->setCity($_POST['City']);
	        $updeteSupplier->setPhone($_POST['Phone']);
	        $updeteSupplier->setMobile($_POST['Mobile']);
	        $updeteSupplier->setFax($_POST['Fax']);
	        $updeteSupplier->setEmail($_POST['Email']);	
	        if($updeteSupplier->update()){
	        	$this->reloadMe('Ihre Angaben wurden gespeichert');
	        }
	        else{
	        	echo 'Ein Fehler ist aufgetreten. Ihre Angaben konnten nicht gespeichtert werden';
	        }
    	}
	   else{
	   	echo 'Der Lieferant konnte nicht gefunden werden';
	    
    	}
    }
    
    function deleteSupplier(){
    	$deleteSupplier = DataManagement::getInstance()->getSupplierById($_POST['deleteData']);

    	if($deleteSupplier->delete()){
    		$this->reloadMe('Der Lieferant wurde gel&ouml;scht');
    	}
    	else{
    		echo 'Ein Fehler ist aufgetreten. Ihre Angaben konnten nicht gespeichtert werden';
    	}
    }
    
	function addSupplier(){
    	$newSupplier = new Supplier();
    	if($newSupplier){
    		$newSupplier->setStreet($_POST['Street']);
    		$newSupplier->setZipcode($_POST['Zipcode']);
    		$newSupplier->setCity($_POST['City']);
    		$newSupplier->setPhone($_POST['Phone']);
    		$newSupplier->setMobile($_POST['Mobile']);
    		$newSupplier->setFax($_POST['Fax']);
    		$newSupplier->setEmail($_POST['Email']);
    		
    		if($newSupplier->create()){
    			$this->reloadMe('Ihre Angaben wurden gespeichert');
    		}
    		else{
    			echo 'Ein Fehler ist aufgetreten. Ihre Angaben konnten nicht gespeichtert werden';
    		}
    	}
    	else{
    		echo 'Es konnte kein neuer Lieferant erstellt werden';
    	}
    }
    
    function reloadMe($msg = NULL){
    	if(isset($msg)){
    		echo '<script>alert('.$msg.');</script>';
    	}
    	header('./?module=COREDATA&page=Supplier');
    }
}