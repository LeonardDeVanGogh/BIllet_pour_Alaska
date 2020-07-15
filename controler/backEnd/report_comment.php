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

$commentManager = new CommentManager($dbh);
$commentData  = $commentManager->readOneComment($_GET['comment_id']);

while($donnees = $commentData->fetch()) {
	$comment = new Comment($donnees);
	$addReport = $comment->report()+1;
	$comment->setReport($addReport);
	$commentManager->updateCommentReport($comment->report(),$comment->id(),$_GET['report_reason']);
}

header("Location: index.php?page=billet&id_article=" . filter_var($_GET['id_article'], FILTER_VALIDATE_INT));