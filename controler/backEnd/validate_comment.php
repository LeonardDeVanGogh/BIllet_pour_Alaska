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
  if($permission->comment_moderation()!=1){
    header("location:index.php?page=home");
    die();
  }
}

$commentManager = new CommentManager($dbh);
$commentData  = $commentManager->readOneComment($_GET['comment_id']);

while($donnees = $commentData->fetch()) {
	$comment = new Comment($donnees);
	$commentManager->validateComment($comment->id());
}

header("Location: index.php?page=billet&id_article=" . filter_var($_GET['id_article'], FILTER_VALIDATE_INT));