<?php
abstract class lib_httpAction
{
  /**
   * @var lib_app_context
   */
  protected $context = null;
  
  public function __construct(lib_context_http $context)
  {
    $this->context = $context->getContext();
  }
  
  /**
   * @return Smarty
   */
  public function getRender()
  {
    return $this->context->getRender();
  }
  
  /**
   * @return lib_pdo
   */
  public function getPDO()
  {
    return $this->context->getPDO();
  }
  
  /**
   * @param string $k
   * @param string | int $v
   * @return string
   */
  public function getParameter($k, $v = null)
  {
    return $this->context->getHTTPContext()->getParameter($k, $v);
  }
  
  /**
   * @return lib_xmpp
   */
  public function getXMPP()
  {
    return $this->context->getXMPP();
  }
}