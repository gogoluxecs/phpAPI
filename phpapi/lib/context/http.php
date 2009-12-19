<?php
class lib_context_http
extends lib_context_base
implements lib_context_interface_backward
{
  public function execute()
  {
    if(is_null($this->httph)) 
      $this->httph = new lib_http($this);

    return $this->httph;
  }
  
  /**
   * @return lib_app_context
   */
  public function getContext()
  {
    return $this->context;
  }
  
  /**
   * @return Smarty
   */
  public function getSmarty()
  {
    if(is_null($this->smarty))
      $this->smarty = new Smarty;
      
    return $this->smarty;   
  }

  /**
   * Get query from 
   * 
   * @param string $k
   * @param string | int $v
   * @return string
   */
  public function getParameter($k, $v = null)
  {
    switch($_SERVER['REQUEST_METHOD'])
    {
      case 'POST':
        $request = $_POST;
        break;
        
      default:
        $request = $_GET;
        break;
    }
    
    if(isset($request[$k]))
      return $request[$k];
      
    if(!is_null($v))
      return $v;      
  }
}