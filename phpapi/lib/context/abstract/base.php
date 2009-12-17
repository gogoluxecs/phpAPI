<?php
abstract class lib_context_abstract_base
{
  protected
    $context = null;

  private 
    $data = array();   
    
  public function __construct(lib_context_interface_base $context = null)
  {
    if(!is_null($context) && is_null($this->context))
      $this->context = $context;     
  }
  
  public function __set($name, $value)
  {
    $this->data[$name] = $value;
  }
  
  public function __get($name)
  {
    if(isset($this->data[$name]))
        return $this->data[$name];
    
    return null;
  }
  
  public function __isset($name)
  {
    return isset($this->data[$name]);
  }
  
  public function __unset($name)
  {
    unset($this->data[$name]);
  }
}