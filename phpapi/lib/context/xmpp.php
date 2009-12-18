<?php
class lib_context_xmpp
extends lib_context_base
{
  public function execute()
  {
    if(is_null($this->xmpph)) 
      $this->xmpph = new lib_xmpp($this);

    return $this->xmpph;  
  }
  
  public function setHost($v)
  {
    $this->set('host', $v); 
  }
  
  public function setUser($v)
  {
    $this->set('user', $v);
  }
  
  public function setPassword($v)
  {
    $this->set('password', $v);
  }
}