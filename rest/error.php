<?php
class rest_error
extends lib_httpAction
{
  public function execute()
  {
    $this->getRender()->assign('error', 'missing page');
    $this->getRender()->display('rest/error.xml');
  }
}