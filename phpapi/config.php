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

require_once 'phpapi/external/src/com/google/code/konstrukt/konstrukt.inc.php';
set_error_handler('k_exceptions_error_handler');
spl_autoload_register('k_autoload');

// context
$context = new lib_context_base();

// pdo initilization
$context->get()->pdo()->dsn = '';
$context->get()->pdo()->user = '';
$context->get()->pdo()->passd = '';
$context->getPDO();


// xmpp initilization
$context->get()->xmpp()->user = '';
$context->get()->xmpp()->password = '';

//send message
$context->getXmpp()->sendMessage('asdfasdf');

$context->getXmpp()->getUser1()->sendMessage('asdfasdfasdf');
$context->getXmpp()->getUser2()->sendMessage('adsfasdfasdf');
