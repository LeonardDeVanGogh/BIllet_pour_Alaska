<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();


$comment =  htmlspecialchars($_POST['addComment']);
$articleId =  filter_var($_POST['articleId'], FILTER_VALIDATE_INT);

if($comment!=""){
	$commentManager = new CommentManager($dbh);
	$commentManager->createComment($articleId,$comment);
}

header("Location: index.php?page=billet&id_article=" . $articleId);