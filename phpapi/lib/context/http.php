<?php
class lib_context_http
extends lib_context_base
{
  public function execute()
  {
    if(is_null($this->httph)) 
      $this->httph = new lib_http($this);

    return $this->httph;
  }
}