<?php 
/**
 * Base config file, that must be  
 * included in your application
 * 
 * Supports rest, xmpp, DB driver, context based
 */
error_reporting(E_ALL | E_STRICT);

set_include_path(
  get_include_path()
  . PATH_SEPARATOR . dirname(dirname(__FILE__)) ."/"
  . PATH_SEPARATOR . dirname(__FILE__)
);

require_once 'external/src/com/google/code/konstrukt/konstrukt.inc.php';
require_once 'external/src/com/google/code/XMPPHP/XMPP.php';
require_once 'external/src/net/smarty/Smarty-2.6.26/libs/Smarty.class.php';

date_default_timezone_set('Europe/Paris');
set_error_handler('k_exceptions_error_handler');
spl_autoload_register('k_autoload');

//TODO import yo cache library 

// application context
$context = new lib_app_context();

// init contexts
$context->getPDOContext()->set('dsn', localConfig::PDO_DSN_DEFAULT);
$context->getPDOContext()->set('user', localConfig::PDO_USER);
$context->getPDOContext()->set('password', localConfig::PDO_PASSWORD);

$context->getXMPPContext();

$context->getHTTPContext();

$context->getRender()->template_dir = localConfig::RENDER_TEMPLATE_DIR;
$context->getRender()->compile_dir = localConfig::RENDER_TEMPLATE_DIR .'_c';