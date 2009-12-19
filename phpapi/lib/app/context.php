<?php
/**
 * Context holder
 */
class lib_app_context
extends lib_app_context_base
{
  /**
   * Initialize PDO
   * 
   * @return lib_pdo
   */
  public function getPDO()
  {
    if(is_null($this->dbh))
      $this->dbh = $this->pdo->execute();

    return $this->dbh;   
  }

  /**
   * Initialize XMPP
   * 
   * @return lib_xmpp
   */
  public function getXMPP()
  {
    if(is_null($this->xmpph))      
      $this->xmpph = $this->xmpp->execute();
    
    return $this->xmpph;    
  }
  
  /**
   * Initialize HTTP (REST)
   * 
   * @return lib_http
   */
  public function getHTTP()
  {
    if(is_null($this->httph))
      $this->httph = $this->http->execute();
    
    return $this->httph;
  }
  
  /**
   * @return Smarty
   */
  public function getRender()
  {
    if(is_null($this->render))
      $this->render = $this->http->getSmarty();

    return $this->render;   
  }
}