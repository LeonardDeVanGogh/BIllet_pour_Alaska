<?php

spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

echo $_GET['comment_id'];

$commentManager = new CommentManager($dbh);
$commentData  = $commentManager->readOneComment($_GET['comment_id']);

while($donnees = $commentData->fetch()) {
	$comment = new Comment($donnees);
	$commentManager->deleteComment($comment->id());
}

header("Location: index.php?page=billet&id_article=" . filter_var($_GET['id_article'], FILTER_VALIDATE_INT));