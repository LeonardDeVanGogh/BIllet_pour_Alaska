<?php

spl_autoload_register('chargerClasse');

try
{
    $dbh = new PDO('mysql:host=localhost;dbname=billet_pour_l_alaska;charset=utf8', 'root', '');

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


$articleId =  $_GET['id_article'];


$articleManager = new articleManager($dbh);


$oneArticle = $articleManager->readOne($articleId);
	 
	 while($donnees = $oneArticle->fetch()) {
        $article = new Article($donnees);
        unlink('img/' . $article->pictureName());
        } 
$articleManager->deleteArticle($articleId);

header("Location: index.php?page=manage_billet");

?>