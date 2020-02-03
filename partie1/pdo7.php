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
$sql = 'SELECT `lastName`, `firstName`, DATE_FORMAT(`birthDate`, \'%d/%m/%Y\') `birthDate`, `card`, `cardNumber` FROM `clients`';
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
    <h1>Exercice 7</h1>
    <a href="http://pdopartie1/pdo1.php/">P1-ex1</a>
    <a href="http://pdopartie1/pdo2.php/">P1-ex2</a>
    <a href="http://pdopartie1/pdo3.php/">P1-ex3</a>
    <a href="http://pdopartie1/pdo4.php/">P1-ex4</a>
    <a href="http://pdopartie1/pdo5.php/">P1-ex5</a>
    <a href="http://pdopartie1/pdo6.php/">P1-ex6</a>
    <a href="http://pdopartie1/pdo7.php/">P1-ex7</a>
    <a href="http://pdopartie2/index.php/">P2 |tous les exercices</a>
  </div>
  <div class="container row">
  <?php foreach ($usersList AS $key => $user):
    ?>
    <div class="col-md-4 pb-5">
      <div class="card shadow bg-dark">
        <p>Nom : <?= $user['lastName'] ?></p>
        <p>Prénom : <?= $user['firstName']?></p>
        <p>Date de naissance : <?= $user['birthDate']?></p>
        <p>Carte de fidélité : <?= $user['card']?></p>
        <?php
        if ($user['cardNumber']):?>
        <p>Numéro de carte : <?= $user['cardNumber']?></p>
      <?php endif;?>
    </div>
    </div>
  <?php
endforeach;?>
</div>
</body>
</html>
