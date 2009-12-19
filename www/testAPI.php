<?php
require_once '../phpapi/init.php';

$start = microtime(true);
echo '<pre>';
// PDO
var_dump($context->getPDO());

// Smarty
$context->getRender();

// XMPP
// http://code.google.com/p/xmpphp/
$context->getXMPPContext()->setUser('testuser');
$context->getXMPPContext()->setHost('xmpp.host');

$context->getXMPP()->init();

echo '</pre>';
$end = microtime(true);
echo '<br />' . ($start - $end);