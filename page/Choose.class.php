<?php
/**
 * Represents the list page.
 * Responsible for listing components.
 *
 * @author Silas Heck <silas-heck@arcor.de>
 * @see Page
 */
class Choose implements Page
{
    /**
     * Identifying string for this page. Intended to be used in GET parameters.
     *
     * @var string
     */
    const PAGE_NAME = "choose";

    static function getName()
    {
        return Choose::PAGE_NAME;
    }
    
    public function getTemplate()
    {
        return 'choose.tpl';
    }

    public function getContent()
    {
        return array(
            pageTitle => 'Komponente w&auml;hlen'
        );
    }
}

?>