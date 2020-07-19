<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

  require_once('controler/frontend/protect_access.php');
  if (isset($permission)){
    if($permission->article_add()==1 OR $permission->article_update()==1){

$articleTitle =  $_POST['articleTitle'];
$articleDescription = $_POST['articleDescription'];
$articleBody = $_POST['articleBody'];
$articleId =  $_POST['articleId'];
$userName= isset($_SESSION['userName'])?$_SESSION['userName']:"";

$articleManager = new articleManager($dbh);

if ($articleId==0){
	$articleManager->createArticle($articleTitle,$articleDescription,$articleBody,$userName);
	 $lastArticle = $articleManager->readLastId();
	 
	 while($donnees = $lastArticle->fetch()) {
        $article = new Article($donnees);
        $article->savePicture();
        echo $article->pictureName();
        $articleManager->updatePictureName($article->id(),$article->pictureName());                                        
    }

}else{
	$articleManager->updateArticle($articleId,$articleTitle,$articleDescription,$articleBody,$userName);
	$oneArticle = $articleManager->readOne($articleId);
	 
	 while($donnees = $oneArticle->fetch()) {
        $article = new Article($donnees);
        $article->savePicture($article->pictureName());
        echo $article->pictureName();
        } 
}

header("Location: index.php?page=billet&id_article=" . $article->id());
    }   
  }else {
    header("Location: index.php");
  }
