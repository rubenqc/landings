<?php

$valid_passwords = array ("admin" => "contraseña");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}

date_default_timezone_set('America/Lima');
$mysqli = new mysqli("localhost", "usuario", "contraseña", "nombredebasededatos");
$mysqli->set_charset("utf8");
$mysqli->query('SET time_zone = "-05:00"');

//require 'fixutf8.php';

?>