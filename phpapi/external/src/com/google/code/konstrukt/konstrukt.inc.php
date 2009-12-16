<?php
/**
 * Resolves a filename according to the includepath.
 * Returns on the first match or false if no match is found.
 */
function k_search_include_path($filename) {
  if (is_file($filename)) {
    return $filename;
  }
  foreach (explode(PATH_SEPARATOR, ini_get("include_path")) as $path) {
    if (strlen($path) > 0 && $path{strlen($path)-1} != DIRECTORY_SEPARATOR) {
      $path .= DIRECTORY_SEPARATOR;
    }
    $f = realpath($path . $filename);
    if ($f && is_file($f)) {
      return $f;
    }
  }
  return false;
}

/**
 * A simple autoloader.
 */
function k_autoload($classname) {
  $filename = str_replace('_', '/', strtolower($classname)).'.php';
  if (k_search_include_path($filename)) {
    require_once($filename);
  }
}

/**
 * An error-handler which converts all errors (regardless of level) into exceptions.
 * It respects error_reporting settings.
 */
function k_exceptions_error_handler($severity, $message, $filename, $lineno) {
  if (error_reporting() == 0) {
    return;
  }
  if (error_reporting() & $severity) {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
  }
}
