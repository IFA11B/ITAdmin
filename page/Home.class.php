<?php
/**
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 * @see Page
 */
class Home implements Page
{

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