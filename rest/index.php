<?php
/**
 * Simple Rest controller 
 * @author g
 */
require_once '../phpapi/init.php';

class rest_index
{
  /**
   * @var lib_context_http
   */
  protected $context = null;
  
  public function __construct(lib_app_context $context)
  {
    $this->context = $context;
  }
  
  /**
   * @todo put get post etc 
   * @return mixed
   */
  public function execute()
  {
    $this->context->getHTTP()->init();
      
    $className =  str_replace('/', '_', strtolower(
      substr($_ENV['REDIRECT_URL'], 1)
      ));
      
    $i = new $className();      
    return $i->execute();       
  }
}

$controller = new rest_index($context);
$controller->execute();