<?php
require_once(PAGE_DIR . 'Page.iface.php');

/**
 * 
 * @author Deaod
 * @see Page
 */
class Login implements Page
{
    /**
     * (non-PHPdoc) 
     * @see Page::getTemplate()
     */
    static function getTemplate() {
       return 'login.tpl'; 
    }
    
    /**
     * (non-PHPdoc) 
     * @see Page::getContent()
     */
    function getContent() {
        return array();
    }
}

?>