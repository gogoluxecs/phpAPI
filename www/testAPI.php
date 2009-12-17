<?php
require_once '../phpapi/init.php';

$start = microtime(true);
echo '<pre>';
for($i = 0; $i < 10000; $i++)
  $context->getPDO();
var_dump($context);
echo '</pre>';
$end = microtime(true);

echo '<br />' . ($start - $end);
unset($start, $end);