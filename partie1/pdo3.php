<?php

function connectDb() {
  require_once '../assets/login-DB.php';
  $dsn = 'mysql:dbname=' . DB . ';host=' . HOST .';charset=utf8';
  try {
    $db = new PDO($dsn, USER, PASSWD);
    return $db;
  } catch (Exception $ex) {
    die('La connexion à la bd a échoué !');
  }
}

$db = connectDb();
$sql = 'SELECT `lastName`, `firstName` FROM `clients` LIMIT 20';
$usersQueryStat = $db->query($sql);
$usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
  <title>exercices | PDO</title>
</head>
<body>
  <div class="container-fluid box-link mb-5">
    <h1>Exercice 3</h1>
    <a href="http://pdopartie1/pdo1.php/">P1-ex1</a>
    <a href="http://pdopartie1/pdo2.php/">P1-ex2</a>
    <a href="http://pdopartie1/pdo3.php/">P1-ex3</a>
    <a href="http://pdopartie1/pdo4.php/">P1-ex4</a>
    <a href="http://pdopartie1/pdo5.php/">P1-ex5</a>
    <a href="http://pdopartie1/pdo6.php/">P1-ex6</a>
    <a href="http://pdopartie1/pdo7.php/">P1-ex7</a>
    <a href="http://pdopartie2/index.php/">P2 |tous les exercices</a>
  </div>
  <div class="container">
    <table class="table table-bordered text-white">
      <thead>
        <tr>
          <th>0</th>
          <th>Nom</th>
          <th>Prénom</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($usersList AS $key => $user):
          ?>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $user['lastName'] ?></td>
            <td><?= $user['firstName']?></td>
          </tr>
          <?php
        endforeach;?>
      </tbody>
    </table>
  </div>
</body>
</html>
