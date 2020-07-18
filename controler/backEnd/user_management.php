<?php

spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

$id = $_GET['user_id'];
$rank = $_GET['new_rank'];

$userManager = new UserManager($dbh);

$userManager->updateUserRank($id,$rank);

header("Location: index.php?page=userAdministration");