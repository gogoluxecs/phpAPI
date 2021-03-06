<?php 
class lib_context_base
extends lib_context_abstract_base
implements lib_context_interface_base
{
  protected 
    $data = array();
  
  public function get($k = null, $v = null)
  {
    if(is_null($k) && is_null($v))
      return $this;
      
    if(isset($this->data[$k]))
      return $this->data[$k];
    else
    {
      if(!is_null($v))
        return $v;  
    }   
    
    return null;  
  }  

  public function set($k, $v)
  {
    if($k instanceof lib_context_interface_base)
      $this->context = $k;
      
    $this->data[$k] = $v;   
  }
}