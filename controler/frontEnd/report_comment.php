<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

$commentManager = new CommentManager($dbh);
$commentData  = $commentManager->readOneComment($_GET['comment_id']);
while($donnees = $commentData->fetch()) {
	$comment = new Comment($donnees);
	$addReport = $comment->report()+1;
	$comment->setReport($addReport);
	$commentManager->updateCommentReport($comment->report(),$comment->id(),$_GET['report_reason']);
}

header("Location: index.php?page=billet&id_article=" . filter_var($_GET['id_article'], FILTER_VALIDATE_INT));
