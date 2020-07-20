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
  if($permission->article_delete()!=1){
    header("location:index.php?page=home");
    die();
  }
}

$articleId =  $_GET['id_article'];
$articleManager = new articleManager($dbh);
$oneArticle = $articleManager->readOne($articleId);	 
while($donnees = $oneArticle->fetch()) {
  $article = new Article($donnees);
  unlink('img/' . $article->pictureName());
} 
$articleManager->deleteArticle($articleId);

header("Location: index.php?page=home");
