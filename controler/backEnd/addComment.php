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

$comment =  htmlspecialchars($_POST['addComment']);
$articleId =  filter_var($_POST['articleId'], FILTER_VALIDATE_INT);

echo 'ID ' . $articleId . ' ' . $comment;

$commentManager = new CommentManager($dbh);

$commentManager->createComment($articleId,$comment);

header("Location: index.php?page=billet&id_article=" . $articleId);