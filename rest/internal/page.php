<?php
class rest_internal_page
extends lib_httpAction
{
  public function preExecute()
  {
    $this->getRender()->assign('name', 'internal rest page 1');
  }
  
  public function get()
  {
    $this->getRender()->assign('name', 'internal rest page parameter ' .
      $this->getParameter('id', 213)
    );
  }
  
  public function execute()
  {
    $this->getRender()->display('rest/internal/page.xml');
  }
}