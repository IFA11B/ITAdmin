<?php

class CoreDataSupplier implements Page
{
    function getTemplate()
    {
        return "coreDataSupplier.tpl";
    }

    function getContent()
    {
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
}