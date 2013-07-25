<?php
/**
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 * @see Page
 */
class Home implements Page
{
    
    const PAGE_NAME = 'home';
    
    static function getName()
    {
        return PAGE_NAME;
    }
    
    public function getTemplate()
    {
        return 'home.tpl';
    }

    public function getContent()
    {
        return array();
    }
}

?>