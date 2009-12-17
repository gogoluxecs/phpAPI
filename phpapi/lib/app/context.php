<?php
/**
 * Context holder
 */
class lib_app_context
extends lib_app_context_base
{
  /**
   * 
   * @return unknown_type
   */
  public function getPDO()
  {
    if(is_null($this->dbh))
      $this->dbh = $this->pdo->execute();

    return $this->dbh;   
  }
}