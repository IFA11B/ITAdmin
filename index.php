<?php
define('ITVERWALTUNG', 1);

require_once('config.php');

loadDir(LIB_DIR);
loadDir(HOME_DIR);

define('PAGE_LOGIN', 'login');
define('PAGE_HOME', 'home');

function loadDir($directory)
{
    $files = scandir($directory);
    
    foreach($files as $file)
    {
        // skip meta files, hidden files, and subdirectories.
        if (   is_dir($file)
            || strncmp($file, '.', 1) == 0)
        {
            continue;
        }
    
        // load the target file
        require_once($directory . $file);
    }
}

/**
 * Returns a Page object representing the page we want to display.
 * 
 * @return Page
 */
function getPage()
{
    if (isset($_GET['page']))
    {
        switch($_GET['page'])
        {
            case PAGE_LOGIN:
                return new Login();
    
            case PAGE_HOME:
                return new Home();
    
            default:
                return new Login();
        }
    }
    else
    {
        return new Login();
    }
}

/**
 * Creates a Smarty instance and configures it for immediate use.
 * 
 * @return Smarty the new Smarty instance.
 */
function createSmarty()
{
    $smarty = new Smarty();

    $smarty->setTemplateDir(HOME_DIR . 'templates');
    $smarty->setCompileDir(HOME_DIR . 'smarty/templates_c');
    $smarty->setCacheDir(HOME_DIR . 'smarty/cache');
    $smarty->setConfigDir(HOME_DIR . 'smarty/configs');
    
    return $smarty;
}


$smarty = createSmarty();
$page = getPage();

$smarty->assign($page->getContent());
$smarty->display($page->getTemplate());

//$smarty->testInstall();
?>