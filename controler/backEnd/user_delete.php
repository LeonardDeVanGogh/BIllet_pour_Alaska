<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

  require_once('controler/frontend/protect_access.php');
  if (isset($permission)){
    if($permission->user_administration()==1){

$database = new Database();
$dbh = $database->getConnection();

$id = $_GET['user_id'];

$userManager = new UserManager($dbh);

$userManager->deleteUser($id);

header("Location: index.php?page=userAdministration");

    }   
  }else {
    header("Location: index.php");
  }