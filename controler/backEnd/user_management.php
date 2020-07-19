<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

  require_once('controler/frontend/protect_access.php');
  if (isset($permission)){
    if($permission->user_rank_update()==1){

$id = $_GET['user_id'];
$rank = $_GET['new_rank'];

$userManager = new UserManager($dbh);

$userManager->updateUserRank($id,$rank);

header("Location: index.php?page=userAdministration");

    }   
  }else {
    header("Location: index.php");
  }