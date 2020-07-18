<?php

spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

$articleId =  $_GET['id_article'];

$articleManager = new articleManager($dbh);

$oneArticle = $articleManager->readOne($articleId);
	 
	 while($donnees = $oneArticle->fetch()) {
        $article = new Article($donnees);
        unlink('img/' . $article->pictureName());
        } 
$articleManager->deleteArticle($articleId);

header("Location: index.php?page=home");

?>