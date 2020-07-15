<?php


spl_autoload_register('chargerClasse');
require_once("model/dbh.php");

?>


<!DOCTYPE html>
<html>

<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="view/css/style.css" rel="stylesheet">
</head>

<body>
<div class="container">
    <?php include("entete.php"); ?>
    <form method="post" action="publications.php">
        <fieldset>
            <legend>Poster un nouvel article</legend>
            <div class="form-group">
                <label>Quel est le titre de l'article ?</label>
                <input type="text" class="form-control" name="titre" id="titre" placeHolder="Titre de l'article">
            </div>
            <div class="form-group">
                <label>Ecrivez votre article ici</label>
                <textarea class="form-control" name="article" id="article" rows="20"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">publier</button>
        </fieldset>
    </form>

    <?php
    $manager = new ArticleManager($dbh);
    $manager->readListArticle();
    ?>

</div>

<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>