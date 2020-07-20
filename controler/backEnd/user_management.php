<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

  require_once('controler/frontend/protect_access.php');
if(!isset($permission)){
  header("location:index.php?page=home");
  die();
}else{
  if($permission->user_rank_update()!=1){
    header("location:index.php?page=home");
    die();
  }
}

$id = $_GET['user_id'];
$rank = $_GET['new_rank'];

$userManager = new UserManager($dbh);

$userManager->updateUserRank($id,$rank);

header("Location: index.php?page=user_administration");