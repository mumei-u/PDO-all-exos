<?php
// connexion a la DATABASE
require '../../assets/login-hospitalE2N.php';
// fonction permettant de continuer si la connexion est réussi
$db = connectDb();
// variable pour afficher les données souhaité d'un client
$sql = 'SELECT `lastname`, `firstname`, DATE_FORMAT(`birthDate`,\'%d-%m-%Y\') `birthdate`, `phone`, `mail` FROM `patients` LIMIT 50';
// Envoie de la requête vers la base de données
$usersQueryStat = $db->query($sql);
// éxecution de la requête
$usersQueryStat->execute();
// Collection des données dans un tableau associatif (FETCH_ASSOC)
$usersInfos = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Profil | Patient</title>
</head>
<body>
  <?php foreach ($usersInfos AS $key => $user):
    ?>
    <div class="container text-center">
      <img src="pdp.PNG" alt="photo de profil">
      <p><?= $user['lastname']. ' ' .$user['firstname']?></p>
      <table class="table table-bordered text-white">
        <thead>
          <tr>
            <th>0</th>
            <th>Date d'anniversaire</th>
            <th>Télephone</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= $key + 1 ?></td>
            <td><?= $user['birthdate']?></td>
            <td><?= $user['phone']?></td>
            <td><?= $user['mail']?></td>
          </tr>
          <?php
        endforeach;?>
      </tbody>
    </table>
    <a class="btn btn-success" href="../index.php">Accueil</a>
    <a class="btn btn-light" href="../exercice1/liste-patients.php">Liste des patients</a>
  </div>
</body>
</html>
