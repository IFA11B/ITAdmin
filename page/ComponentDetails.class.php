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
        
        if (User::isLoggedIn() !== true)
        {
            $result['error'] = 'notLoggedIn';
            return;
        }
        
        /** @var User */
        $user = User::getSessionUser();
        /** @var Component */
        $com = DataManagement::getInstance()->getComponentById($_GET['comId']);
        
        $result['writeAccess'] = $this->module->canWrite($user);
        $result['fields'] = $com->getFields();
        $result['parent'] = $com->getParent();
        $result['children'] = $com->getChildren();
        
        return $result;
    }
}
