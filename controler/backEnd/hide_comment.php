<?php

spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

$commentManager = new CommentManager($dbh);
$commentData  = $commentManager->readOneComment($_GET['comment_id']);

while($donnees = $commentData->fetch()) {
	$comment = new Comment($donnees);
	$commentManager->hideComment($comment->id(),1);
}

header("Location: index.php?page=billet&id_article=" . filter_var($_GET['id_article'], FILTER_VALIDATE_INT));