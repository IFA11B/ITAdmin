<?php
require_once(PAGE_DIR . 'Page.iface.php');

/**
 * 
 * @author Deaod
 * @see Page
 */
class Home implements Page
{
    /**
     * (non-PHPdoc)
     * @see Page::getTemplate()
     */
    static function getTemplate()
    {
        return 'home.tpl'; 
    }
    
    /**
     * (non-PHPdoc)
     * @see Page::getContent()
     */
    function getContent()
    {
        return array();
    }
}

?>