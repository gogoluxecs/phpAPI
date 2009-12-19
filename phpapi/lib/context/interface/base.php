<?php
/**
 * Basic context interface with 
 */
interface lib_context_interface_base
{
  /**
   * Sets key or return default value if persits
   * 
   * @param mixed $k 
   * @param mixed $v default value, if k not persists
   * @return mixed
   */
  function get($k = null, $v = null);

  /**
   * Sets key and value 
   * 
   * @param mixed $k
   * @param mixed $v
   * @return void
   */
  function set($k, $v);
}