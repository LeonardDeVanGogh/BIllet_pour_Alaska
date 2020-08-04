<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();
require_once('controler/frontEnd/protect_access.php');

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

$userUpdated = $userManager->readUserById($_GET['user_id']);
while($donnees = $userUpdated->fetch()){
	$user = new User($donnees);
}
mail('contact@billetpourlalaska.com',"update: ". $_GET['new_rank'] . " / " . utf8_decode($user->user()),'');

header("Location: index.php?page=user_administration");