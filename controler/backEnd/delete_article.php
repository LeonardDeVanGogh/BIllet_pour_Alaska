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
  if($permission->article_delete()!=1){
    header("location:index.php?page=home");
    die();
  }
}

$articleId =  $_GET['id_article'];
$articleManager = new ArticleManager($dbh);
$oneArticle = $articleManager->readOne($articleId);	 
while($donnees = $oneArticle->fetch()) {
  $article = new Article($donnees);
  $article->pictureName()!="default.jpg"?unlink('img/' . $article->pictureName()):"";
  
  $commentManager = new CommentManager($dbh);
  $readComment = $commentManager->readComment($_GET['id_article']);
  while($donneesComment = $readComment->fetch()){
  	$comment = new Comment($donneesComment);
  	$commentManager->deleteComment($comment->id());
  }
} 
$articleManager->deleteArticle($articleId);

header("Location: index.php?page=home");
