<?php
require_once '../phpapi/init.php';

$start = microtime(true);
echo '<pre>';

$context->getXMPP()->getContext()->setUser('georgi lambov');
$context->getXMPPContext()->setHost('testhost');

$context->getXMPP()->init();
  
  
echo '</pre>';
$end = microtime(true);

echo '<br />' . ($start - $end);
unset($start, $end);
