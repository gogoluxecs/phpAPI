<?php 
class lib_context_base
extends lib_context_abstract_base
implements lib_context_interface_base
{
  protected 
    $data = array();
  
  public function get($k = null)
  {
    if(is_null($k))
      return $this->context;

    if(isset($this->data[$k]))
      return $this->data[$k];

    return null;  
  }  

  public function set($k, $v)
  {
    if($k instanceof lib_context_interface_base)
      $this->context = $k;
      
    $this->date[$k] = $v;   
  }
  
  public function getPdo()
  {
    ;   
  }
}