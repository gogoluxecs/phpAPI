<?php
/**
 * Commmon configuration class
 */
class localConfig
{
  const PDO_DSN_DEFAULT = 'mysql:dbname=testdb;host=127.0.0.1';
  // place holder of other dsn's
  
  const PDO_USER = 'root';
  const PDO_PASSWORD = '';
  
  const RENDER_TEMPLATE_DIR = '../templates';
}