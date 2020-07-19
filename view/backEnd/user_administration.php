<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

  require_once('controler/frontend/protect_access.php');
  if (isset($permission)){
    if($permission->user_administration()==1 OR $permission->user_rank_administration()==1){

?>

<!DOCTYPE html>
<html lang="en">

<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Clean Blog - Start Bootstrap Theme</title> 
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
<?php require_once('view/frontend/entete.php');?>



  <!-- Main Content -->
  <div class="container navWithoutPicture">
 
    <?php
      $userManager = new UserManager($dbh);
      $users = $userManager->readAllUsers();
      while($donnees = $users->fetch()) {
        $user = new User($donnees);
    ?>
        <div class="row">
                <div class="col-lg-9">
                  <?= $user->user() ?>
                </div>
                <div class="col-lg-2">
                  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <?= $user->rank() ?>
                    <span class="caret"></span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="menuDeroulant">
                    <a class="dropdown-item" href="index.php?page=user_management&user_id=<?= $user->id() ?>&new_rank=user">user</a>
                    <a class="dropdown-item" href="index.php?page=user_management&user_id=<?= $user->id() ?>&new_rank=moderator">moderator</a>
                    <a class="dropdown-item" href="index.php?page=user_management&user_id=<?= $user->id() ?>&new_rank=administrator">administrator</a>
                  </div>
                </div>
                <a class="col-lg-1 fas fa-times-circle" href="index.php?page=user_delete&user_id=<?= $user->id() ?>"></a>
              </div>
            <hr>   
     <?php  }
    ?>
              
  </div>


      

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script> 

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script> 

</body> 

</html>
<?php
    }
  }else{
    header("Location:index.php?page=home");
  }