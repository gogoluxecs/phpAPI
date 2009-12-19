<?php
class lib_context_pdo
extends lib_context_base
{
  
  /**
   * @return lib_pdo
   */
  public function execute()
  {
    try
    {
      if(is_null($this->dbh))
      {
        $this->dbh = new lib_pdo(
          $this->get('dsn'), 
          $this->get('user'), 
          $this->get('password')
        );
      }
        
      return $this->dbh;    
    }
    catch (PDOException $e)
    {
      throw $e;
    }
  }
}