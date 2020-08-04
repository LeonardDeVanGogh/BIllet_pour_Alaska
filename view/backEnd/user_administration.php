<?php

defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

require_once('controler/frontEnd/protect_access.php');
if (isset($permission)){
  if($_SESSION['userRank']=="moderator" OR $_SESSION['userRank']=="administrator"){ ?>

    <!DOCTYPE html>
    <html lang="fr">

    <head> 
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Billet pour l'Alaska</title> 
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <!-- Custom styles for this template -->
      <link href="css/clean-blog.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
    </head>

    <body>      
      <!-- Navigation -->
      <?php require_once('view/frontEnd/entete.php');?>
      <!-- Main Content -->
      <div class="container navWithoutPicture">
        <?php
        $userManager = new UserManager($dbh);
        $users = $userManager->readAllUsers();
        while($donnees = $users->fetch()) {
          $user = new User($donnees);
          ?>
          <div class="row align-items-center">
            <div class="col-lg-8">
              <?= $user->user() ?>
            </div>
            <?php if($permission->user_rank_update()==1){ ?>
              <div class="col-lg-3">
                <button class="btn btn-default dropdown-toggle buttonColorUpdate" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <?= $user->rank() ?>
                  <span class="caret"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="menuDeroulant">
                  <a class="dropdown-item" href="index.php?page=user_management&user_id=<?= $user->id() ?>&new_rank=user">user</a>
                  <a class="dropdown-item" href="index.php?page=user_management&user_id=<?= $user->id() ?>&new_rank=moderator">moderator</a>
                  <a class="dropdown-item" href="index.php?page=user_management&user_id=<?= $user->id() ?>&new_rank=administrator">administrator</a>
                </div>
              </div>
            <?php }
            if($permission->user_delete()==1){ ?>
              <a class="col-lg-1 fas fa-times-circle fa-2x" href="index.php?page=user_delete&user_id=<?= $user->id() ?>" title="supprimer compte"></a>
            <?php } ?>
          </div>
          <hr>   
        <?php } ?>
      </div>

      <!-- Bootstrap core JavaScript -->
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
      <!-- Custom scripts for this template -->
      <script src="js/clean-blog.min.js"></script> 
    </body> 
    </html>
  <?php }
}else{
  header("Location:index.php?page=home");
}