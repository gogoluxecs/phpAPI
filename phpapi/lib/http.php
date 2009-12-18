<?php
/**
 * HTTP (Rest) lib
 */
class lib_http
implements lib_context_interface_backward
{
  protected
    $context = null;

  public function __construct(lib_context_http $context)
  {
    $this->context = $context;
  }  
    
  public function init()
  {
    header('Content-type: text/xml; charset=utf-8');
  }

  public function get($url)
  {
    $handle = fopen($url, 'rb');
    $contents = stream_get_contents($handle);
    fclose($handle);
    
    return $contents;
  }
    
  public function getContext()
  {
    return $this->context;
  }
}