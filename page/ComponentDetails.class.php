<?php

class ComponentDetails implements Page
{
    /**
     * 
     * @var string
     */
    const PAGE_NAME = 'comDetails';
    
    public static function getName()
    {
        return ComponentDetails::PAGE_NAME;
    }
    
    /**
     * 
     * @var Module
     */
    private $module;
    
    public function __construct(Module $module = null)
    {
        $this->module = $module;
    }
    
    public function getTemplate()
    {
        return 'comDetails.tpl';
    }
    
    public function getContent()
    {
        /** @var array */
        $result = array();
        
        /** @var Component */
        $com = DataManagement::getInstance()->getComponentById($_POST['comId']);
        
        $result['component'] = $com;
        
        if (postVar('saving') != null) {
            // were saving
            
            foreach(postVar('properties') as $property) {
                $com->$property = postVar($property);
            }
            
            $com->update();
        } else {
            // were displaying
            
            
        }
        
        return $result;
    }
}
