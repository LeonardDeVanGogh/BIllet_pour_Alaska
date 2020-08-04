<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

require_once('controler/frontEnd/protect_access.php');
if(!isset($permission)){
  header("location:index.php?page=home");
  die();
}else{
  if($permission->user_delete()!=1){
    header("location:index.php?page=home");
    die();
  }
}

$database = new Database();
$dbh = $database->getConnection();

$id = $_GET['user_id'];

$userManager = new UserManager($dbh);
$userReaded = $userManager->readUserById($id);

while ($donnees = $userReaded->fetch()){
	$user = new User($donnees);
}
mail('contact@billetpourlalaska.com', "delete: " . utf8_decode($user->user()),'');
$userManager->deleteUser($id);

if ($user->email()!= $_SESSION['userEmail']){
	header("Location: index.php?page=user_administration");
}else{
	session_destroy();
	header("Location: index.php?page=home");
}