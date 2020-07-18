<?php

spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();


echo $_POST['rank'] . "<br/>";
$rank = $_POST['rank'];



$commentModeration = (!isset($_POST['comment_moderation'])) ? 0 : 1;
$commentHidden = (!isset($_POST['comment_hidden'])) ? 0 : 1;
$commentDelete = (!isset($_POST['comment_delete'])) ? 0 : 1;
$articleAdd = (!isset($_POST['article_add'])) ? 0 : 1;
$articleUpdate = (!isset($_POST['article_update'])) ? 0 : 1;
$articleDelete = (!isset($_POST['article_delete'])) ? 0 : 1;
$userAdministration = (!isset($_POST['user_administration'])) ? 0 : 1;
$rankUpdate = (!isset($_POST['rank_update'])) ? 0 : 1;
$userRankUpdate = (!isset($_POST['user_rank_update'])) ? 0 : 1;

$rankManager = new RankManager($dbh);
$rankManager->rankUpdate($commentModeration,$commentHidden,$commentDelete,$articleAdd,$articleUpdate,$articleDelete,$userAdministration,$rankUpdate,$userRankUpdate,$rank);

header("Location: index.php?page=rankAdministration");

