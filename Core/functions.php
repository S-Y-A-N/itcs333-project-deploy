<?php

use Core\Response;

function dump($value) {
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
}

function base_path($path) {
  return BASE_PATH . $path;
}

function view($path, $attributes = []) {
  extract($attributes);

  require base_path("views/$path");
}

function authorize($condition) {
  if (! $condition) {
    abort(Response::FORBIDDEN);
  }
}

function abort($code = Response::NOT_FOUND)
{
  http_response_code($code);
  require base_path("views/{$code}.php");
  die();
}