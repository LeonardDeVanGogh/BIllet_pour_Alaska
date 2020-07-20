<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();
  require_once('controler/frontend/protect_access.php');
  if (isset($permission)){
    if($permission->comment_delete()==1){

echo $_GET['comment_id'];

$commentManager = new CommentManager($dbh);
$commentData  = $commentManager->readOneComment($_GET['comment_id']);

while($donnees = $commentData->fetch()) {
	$comment = new Comment($donnees);
	$commentManager->deleteComment($comment->id());
}

header("Location: index.php?page=billet&id_article=" . filter_var($_GET['id_article'], FILTER_VALIDATE_INT));   
  	}
  }else {
    header("Location: index.php");
  }