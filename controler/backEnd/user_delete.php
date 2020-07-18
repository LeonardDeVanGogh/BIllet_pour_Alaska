<?php

spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

$id = $_GET['user_id'];

$userManager = new UserManager($dbh);

$userManager->deleteUser($id);

header("Location: index.php?page=userAdministration");