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
echo $_GET['comment_id'];

$commentManager = new CommentManager($dbh);
$commentData  = $commentManager->readOneComment($_GET['comment_id']);

while($donnees = $commentData->fetch()) {
	$comment = new Comment($donnees);
	$commentManager->hideComment($comment->id(),1);
}

header("Location: index.php?page=billet&id_article=" . filter_var($_GET['id_article'], FILTER_VALIDATE_INT));