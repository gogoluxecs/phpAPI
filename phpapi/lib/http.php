<?php
/**
 * HTTP (Rest) lib
 */
class lib_http
implements lib_context_interface_backward
{
  /**
   * @return lib_context_http
   */ 
  protected $context = null;

  public function __construct(lib_context_http $context)
  {
    $this->context = $context;
  }  

  /**
   * @return void
   */
  public function init()
  {
    header('Content-type: text/xml; charset=utf-8');
  }
  
  public function initREST()
  {
    $this->init();
    
    $this->action();
    $this->controller();
  }
  
  /**
   * Get rest response
   * 
   * @param string $url
   * @return string
   */
  public function get($url)
  {
    $handle = fopen($url, 'rb');
    $contents = stream_get_contents($handle);
    fclose($handle);
    
    return $contents;
  }
  
  /**
   * @see phpapi/lib/context/interface/lib_context_interface_backward#getContext()
   * @return lib_context_http
   */
  public function getContext()
  {
    return $this->context;
  }
  
  protected function action()
  {
    if(isset($_ENV['REDIRECT_URL']))
    {
      $className =  str_replace('/', '_', strtolower(
        substr($_ENV['REDIRECT_URL'], 1)
      ));
      
      if(class_exists($className, true))
        $this->context->set('action', 
          new $className($this->context));
    }
  }
  
  protected function controller()
  {
    $action = $this->context->get('action', 
      new rest_error($this->context));
    
    if(method_exists($action, 'preExecute'))
      $action->preExecute();  
      
    switch($_SERVER['REQUEST_METHOD'])
    {
      case 'POST':
        if(method_exists($action, 'post'))
          $action->post();
        break;
      
      default:
        if(method_exists($action, 'get'))
          $action->get();  
        break;
    }

    if(method_exists($action, 'execute'))
      $action->execute();
  }
}