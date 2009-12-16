<?php
class lib_pdo
{
  /**
   * @var lib_context_pdo
   */
  protected $context = null;

  private 
    $dbh = null;   
    
  
  public function __construct(lib_context_pdo $context)
  {
    $this->context = $context;

    try
    {
      if(is_null($this->dbh)) 
        $this->dbh = new PDO(
          $this->context->dsn, 
          $this->context->user, 
          $this->context->password
        );
    } 
    catch (PDOException $e) {
      throw $e;
    }
  }
  
  public function execute()
  {
    return $this->dbh;
  }
}