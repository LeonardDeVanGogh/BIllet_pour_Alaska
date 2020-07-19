<?php

spl_autoload_register('chargerClasse');
echo'coucou';

$database = new Database();
$dbh = $database->getConnection();

$commentManager = new CommentManager($dbh);
$commentData  = $commentManager->readOneComment($_GET['comment_id']);

while($donnees = $commentData->fetch()) {
	$comment = new Comment($donnees);
	$commentManager->validateComment($comment->id());
}

header("Location: index.php?page=billet&id_article=" . filter_var($_GET['id_article'], FILTER_VALIDATE_INT));