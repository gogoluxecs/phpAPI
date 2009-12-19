<?php
/**
 * Wrapper for XMPPHP_XMPP
 */
class lib_xmpp
implements lib_context_interface_backward
{
  /**
   * @var lib_context_xmpp
   */
  protected $context = null;
  
  /**
   * @param lib_context_xmpp $context required
   * @return void
   */
  public function __construct(lib_context_xmpp $context)
  {
    $this->context = $context;  
  }
  
  /**
   * Initialize XMPP
   * 
   * @return XMPPHP_XMPP
   */
  public function init()
  {
    if(is_null($this->context->conn))
    {
      $this->validateInit();
      
      $this->context->conn = new XMPPHP_XMPP(
        $this->context->get('host'), 
        $this->context->get('port', 5222), 
        $this->context->get('user'),
        $this->context->get('password'),
        $this->context->get('resource', 'xmpphp'),
        $this->context->get('server', $this->context->get('host')),
        $this->context->get('printlog', true),
        $this->context->get('loglevel', XMPPHP_Log::LEVEL_INFO)
      );
    }

    return $this->context->conn;
  }
  
  public function getContext()
  {
    return $this->context;
  }
  
  /**
   * Check some required values
   * 
   * @return void | exception
   */
  private function validateInit()
  {
    if(!$this->context->get('host'))
      throw new Exception('XMPP host is required parameter'); 
      
    if(!$this->context->get('user'))
      throw new Exception('XMPP user is required parameter');   
  }
}