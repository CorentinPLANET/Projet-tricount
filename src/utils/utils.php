<?php

function redirectTo($path)
{
  header("Location: " . $path);
}

function render($path, $template = false, $data = [])
{
  extract($data);
  if ($template) {
    require "templates/$path.php";
  } else {
    require "views/$path.php";
  }
}

function component($name, $data = [])
{
  extract($data);
  include "templates/$name.php";
}

function sanitize($string)
{
  return htmlspecialchars($string, ENT_QUOTES, "UTF-8");
}

function isValidEmail($email)
{
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function formatDate($date, $format = "d/m/Y")
{
  return date($format, strtotime($date));
}
