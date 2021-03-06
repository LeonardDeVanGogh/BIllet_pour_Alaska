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
  if($permission->rank_update()!=1){
    header("location:index.php?page=home");
    die();
  }
}

$rank = $_POST['rank'];
$commentModeration = (!isset($_POST['comment_moderation'])) ? 0 : 1;
$commentHidden = (!isset($_POST['comment_hidden'])) ? 0 : 1;
$commentValidation = (!isset($_POST['comment_validation'])) ? 0 : 1;
$commentDelete = (!isset($_POST['comment_delete'])) ? 0 : 1;
$articleAdd = (!isset($_POST['article_add'])) ? 0 : 1;
$articleUpdate = (!isset($_POST['article_update'])) ? 0 : 1;
$articleDelete = (!isset($_POST['article_delete'])) ? 0 : 1;
$userAdministration = (!isset($_POST['user_administration'])) ? 0 : 1;
$userDelete = (!isset($_POST['user_delete'])) ? 0 : 1;
$userRankUpdate = (!isset($_POST['user_rank_update'])) ? 0 : 1;
$rankUpdate = (!isset($_POST['rank_update'])) ? 0 : 1;

$rankManager = new RankManager($dbh);
$rankManager->rankUpdate($commentModeration,$commentValidation,$commentHidden,$commentDelete,$articleAdd,$articleUpdate,$articleDelete,$userAdministration,$userDelete,$userRankUpdate,$rankUpdate,$rank);

header("Location: index.php?page=rank_administration");