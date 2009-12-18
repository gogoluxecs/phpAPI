<?php
require_once '../phpapi/init.php';

$context->getHTTP()->init();
echo $context->getHTTP()->get('http://phpapi/www/testREST.php');

