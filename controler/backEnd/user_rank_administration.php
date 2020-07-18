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


echo $_POST['rank'] . "<br/>";
$rank = $_POST['rank'];



$commentModeration = (!isset($_POST['comment_moderation'])) ? 0 : 1;
$commentHidden = (!isset($_POST['comment_hidden'])) ? 0 : 1;
$commentDelete = (!isset($_POST['comment_delete'])) ? 0 : 1;
$articleAddUpdate = (!isset($_POST['article_add_update'])) ? 0 : 1;
$articleDelete = (!isset($_POST['article_delete'])) ? 0 : 1;
$rankUpdate = (!isset($_POST['rank_update'])) ? 0 : 1;
$userRankUpdate = (!isset($_POST['user_rank_update'])) ? 0 : 1;

$rankManager = new RankManager($dbh);
$rankManager->rankUpdate($commentModeration,$commentHidden,$commentDelete,$articleAddUpdate,$articleDelete,$rankUpdate,$userRankUpdate,$rank);

header("Location: index.php?page=rankAdministration");

