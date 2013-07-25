<?php

/**
 * Interface for use for individual pages (Login, Home).
 *
 * @author Lukas Bagaric <lukas.bagaric@gmail.com>
 */
interface Page
{
    /**
     * Returns an identifying string for this page. Intended to be used in GET parameters.
     * 
     * @return (string) internal name of the page.
     */
    static function getName();
    
    /**
     * Returns a path to the template used by this page.
     *
     * @return string
     */
    function getTemplate();

    /**
     * Returns an associative array containing all data to be presented to the user.
     *
     * @return array
     */
    function getContent();
}
?>