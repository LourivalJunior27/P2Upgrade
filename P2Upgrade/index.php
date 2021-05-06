<?php

$route = explode("/", $_GET['url'] ?? 'home');

if (file_exists("pages/{$route[0]}.php")) {
  include "pages/{$route[0]}.php";
}
