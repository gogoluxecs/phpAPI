<?php
/**
 * Initializer 
 */
class lib_app_context_base
extends lib_context_base
{
  protected
    $xmpp = null, 
    $pdo = null;
  
  /**
   * @return lib_context_pdo
   */
  public function getPDOContext()
  {
    if(is_null($this->pdo))
      $this->pdo = new lib_context_pdo();
      
    return $this->pdo;   
  }
  
  /**
   * @return lib_context_xmpp
   */
  public function getXMPPContext()
  {
    if(is_null($this->xmpp))
      $this->xmpp = new lib_context_xmpp();
      
    return $this->xmpp;    
  }
  
  /**
   * @return lib_context_http
   */
  public function getHTTPContext()
  {
    if(is_null($this->http))
      $this->http = new lib_context_http();
      
    return $this->http;   
  }

  /**
   * General context setter and getter 
   *
   * @param lib_context_interface_base $context
   * @return lib_context_interface_base
   */
  public function getContext($context)
  {
    if(is_null($this->$context))
      $this->$context = new $context(); 
      
    return $this->$context;   
  }
}