<?php

function connectDb() {
    require_once 'params.php';

    $dsn = 'mysql:dbname=' . DB . ';host=' . HOST;

    try {
        $db = new PDO($dsn, USER, PASSWD);
        return $db;
    } catch (Exception $ex) {
        die('La connexion à la bd a échoué !');
    }
}


$db = connectDb();
$query = 'SELECT * FROM `users`';
$usersQueryStat = $db->query($query);
$usersList = $usersQueryStat->fetchAll(PDO::FETCH_ASSOC);
foreach ($usersList AS $user):
    ?>
    <p><?= $user['firstname'] . ' ' . $user['lastname'] ?></p>
<?php
endforeach;
