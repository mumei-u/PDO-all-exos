<?php
define('USER', 'root');
define('PASSWD', 'Mumei53670812&');
define('HOST', 'localhost');
define('DB', 'hospitalE2N');

// Fuction permettant la connexion dans la Base de données
function connectDb() {
  $dsn = 'mysql:dbname=' . DB . ';host=' . HOST .';charset=utf8';
  try {
    $db = new PDO($dsn, USER, PASSWD);
    return $db;
  } catch (Exception $ex) {
    die('La connexion à la bd a échoué !');
  }
}
