<?php
/**
 * Holder for Buildin PDO class
 */
class lib_pdo 
extends PDO
{
  public function __toString()
  {
    return get_class($this);
  }
}