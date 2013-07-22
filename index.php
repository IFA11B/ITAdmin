<?php
define('ITVERWALTUNG', 1);

require_once('config.php');
loadLib('DbConnector.php');
loadLib('password.php');
loadLib('Page.iface.php');
loadAllPages();

define('PAGE_LOGIN', 'login');
define('PAGE_HOME', 'home');

function loadAllPages()
{
    $files = scandir(PAGE_DIR);
    
    foreach($files as $file)
    {
        if ($file == '.'
            || $file == '..')
        {
            continue;
        }
        
        require_once($file);
    }
}

function loadLib($library)
{
    require_once(LIB_DIR . $library);
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
    require_once(HOME_DIR . 'lib/smarty/Smarty.class.php');
    
    $smarty = new Smarty();

    $smarty->setTemplateDir('./templates');
    $smarty->setCompileDir('./smarty/templates_c');
    $smarty->setCacheDir('./smarty/cache');
    $smarty->setConfigDir('./smarty/configs');
    
    return $smarty;
}


$smarty = createSmarty();
$page = getPage();

$smarty->assign($page->getContent());
$smarty->display($page->getTemplate());

//$smarty->testInstall();
?>