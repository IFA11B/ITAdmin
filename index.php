<?php
define('ITVERWALTUNG', 1);

require_once ('config.php');

loadDir(LIB_DIR, array(LIB_DIR . 'smarty'));
loadDir(PAGE_DIR);

/**
 * Loads all PHP files in a given directory and its sub-directories, excluding files and directories (if specified).
 *
 * @param string $directory the directory to
 * @param array $excluded (optional)
 */
function loadDir($directory, array $excluded = array())
{
    $files = scandir($directory);
    $subDirs = array();
    
    foreach ($files as $file)
    {
        
        // skip meta files, hidden files, and excluded directories.
        if (strncmp($file, '.', 1) == 0 || in_array($directory . $file, $excluded))
        {
            continue;
        }
        
        if (is_dir($directory . $file))
        {
            $subDirs[] = $directory . $file . '/';
            continue;
        }
        
        // load the target file
        require_once ($directory . $file);
    }
    
    foreach ($subDirs as $subDir)
    {
        loadDir($subDir, $excluded);
    }
}

/**
 * If the GET parameter 'module' is set, returns a new Module instance with a name matching what was specified in the
 * GET parameter.
 * Returns NULL otherwise.
 *
 * @return (Module &#124; NULL) Module object if a valid module name was specified, NULL otherwise.
 */
function getModule()
{
    switch(getVar('module'))
    {
    case Reporting::MODULE_NAME:
        return new Reporting();
        
    case Order::MODULE_NAME:
        return new Order();
    
    case CoreDataManagement::MODULE_NAME:
    	return new CoreDataManagement();
    }
    return null;
}

/**
 * Returns a Page object representing the page we want to display.
 *
 * @return Page
 */
function getPage()
{
    switch(getVar('page'))
    {
    case Login::getName():
        return new Login();
    
    case Home::getName():
        return new Home();
    }
    return new Login();
}

/**
 * Returns content from GET array stored under $key or null if $key cant be found.
 *
 * @param string $key
 * @return (string &#124; NULL)
 */
function getVar($key)
{
    if (isset($_GET[$key]) === true) return $_GET[$key];
    return null;
}

/**
 * Returns content from POST array stored under $key or null if $key cant be found.
 *
 * @param string $key
 * @return (string &#124; NULL)
 */
function postVar($key)
{
    if (isset($_POST[$key]) === true) return $_POST[$key];
    return null;
}

/**
 * Returns content from SESSION array stored under $key or $default if $key cant be found.
 *
 * @param string $key
 * @param string $default (optional) default value if $key cannot be found
 * @return (string &#124; NULL)
 */
function sessionVar($key, $default = null) {
    if (isset($_SESSION[$key]) === true)
        return $_SESSION[$key];
    return $default;
}

/**
 */
function verifySession() {
    $user = User::getSessionUser();
    if ($userId != null) {
        return true;
    }
    return false;
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

if (verifySession()) {
    $module = getModule();
    if ($module == null)
    {
        $page = getPage();
    }
    else
    {
        $page = $module->getPage(getVar('page'));
    }
} else {
    $page = new Login();
}

$smarty->assign($page->getContent());
$smarty->display($page->getTemplate());

//$smarty->testInstall();
?>