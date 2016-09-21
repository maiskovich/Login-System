<?
/**
 * Auto loader modified for avoiding errors with other autoloaders from externals plugins (example PhpExcel)
 */
function myautoloader($class){
	if(file_exists(LIBS .$class.".php"))
    {		
	require LIBS .$class.".php";
	}
	else
    {
        return false;
    }
}	
spl_autoload_register('myautoloader');
//Time Zone
date_default_timezone_set('America/Buenos_Aires');

//Error reporting, hide notice
error_reporting(E_ERROR | E_PARSE| E_WARNING);
// Use an autoloader

require 'config.php';
require 'util/Auth.php';
require 'util/DataCheck.php';

//Load the bootstrap
$bootstrap = new Bootstrap();
$bootstrap->init();
?>