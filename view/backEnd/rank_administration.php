<?php

defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

include('controler/frontEnd/protect_access.php');
if(!isset($permission)){
  header("location:index.php?page=home");
  die();
}else{
  if($permission->rank_update()!=1){
    header("location:index.php?page=home");
    die();
  }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Billet Pour l'Alaska</title> 
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
      $rank = "user";
      include('view/backEnd/rank_administration_form.php');
      $rank = "moderator";
      include('view/backEnd/rank_administration_form.php');
      $rank = "administrator";
      include('view/backEnd/rank_administration_form.php');
    ?>              
  </div>      

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script> 
</body> 
</html>