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
  . PATH_SEPARATOR . dirname(__FILE__)
  . PATH_SEPARATOR . dirname(__FILE__).'/lib/');

require_once 'external/src/com/google/code/konstrukt/konstrukt.inc.php';
set_error_handler('k_exceptions_error_handler');
spl_autoload_register('k_autoload');

// context
$context = new lib_app_context();

$context->getPDOContext()->set('dsn', localConfig::PDO_DSN);
$context->getPDOContext()->set('user', localConfig::PDO_USER);
$context->getPDOContext()->set('password', localConfig::PDO_PASSWORD);