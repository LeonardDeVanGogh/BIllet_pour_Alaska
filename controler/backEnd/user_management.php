<?php

spl_autoload_register('chargerClasse');

try
{
    $dbh = new PDO('mysql:host=localhost;dbname=billet_pour_l_alaska;charset=utf8', 'root', '');

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$id = $_GET['user_id'];
$rank = $_GET['new_rank'];

$userManager = new UserManager($dbh);

$userManager->updateUserRank($id,$rank);

header("Location: index.php?page=userAdministration");