<?php
class lib_context_pdo
{
  public function __construct(lib_context_base $context)  
  {
    
  }
  
  public function execute()
  {
    if(is_null($this->dbh)) 
        $this->dbh = new PDO(
          $this->dsn, 
          $this->user, 
          $this->password
        );
        
    return $this->dbh;    
  }
}