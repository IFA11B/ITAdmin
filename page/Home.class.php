<?php
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
    public function getTemplate()
    {
        return 'home.tpl'; 
    }
    
    /**
     * (non-PHPdoc)
     * @see Page::getContent()
     */
    public function getContent()
    {
        return array();
    }
}

?>