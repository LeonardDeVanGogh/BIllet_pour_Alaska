<?php
  defined("_Can_access_") or die("Inclusion directe non autorisée");
  spl_autoload_register('chargerClasse');

  $database = new Database();
  $dbh = $database->getConnection();

  require_once('controler/frontEnd/protect_access.php');

  if(isset($_SESSION['userEmail'])){
    $userManager = new UserManager($dbh);
    $userInfos = $userManager->readUser($_SESSION['userEmail']);
    while ($donnees = $userInfos->fetch()){
      $user = new User($donnees);
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
 
<body style="background-image: url('img/session-background.jpg')">
  
  <!-- Navigation -->
<?php require_once('view/frontEnd/entete.php');?>



  <!-- Main Content -->
  <div class="container navWithoutPicture">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form name="userNameUpdate" id="userNameUpdate" method="post" action="index.php?page=user_infos_update&what=userNameUpdate" novalidate>
          <div class="control-group">
            <div class="form-group controls">
              <label>Modifier pseudonyme</label>
              <?php echo '<input type="text" class="form-control" name="userName" id="userName" value="' . $user->user() . '">';?>
            </div>
          </div>        
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="userConnectionButton" id="userConnectionButton">
              <i class="fas fa-edit"></i>
              <span> Modifier</span>
            </button>
          </div>
        </form>
      </div>
    </div>
    <?php 
      if (isset($_GET['emailAlreadyUsed'])){
        echo '<div class="row">
              <div class="col-lg-8 col-md-10 mx-auto colorWrong">email déjà utilisé</div>
              </div>';
      }
    ?>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form name="userEmailUpdate" id="userEmailUpdate" method="post" action="index.php?page=user_infos_update&what=userEmailUpdate" novalidate>
          <div class="control-group">
            <div class="form-group controls">
              <label>Modifier email</label>
              <?php echo '<input type="text" class="form-control" name="userEmail" id="userName" value="' . $_SESSION['userEmail'] . '">';?>
            </div>
          </div>        
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="userConnectionButton" id="userConnectionButton">
              <i class="fas fa-edit"></i>
              <span> Modifier</span>
            </button>
          </div>
        </form>
      </div>
    </div>
    <?php 
      if (isset($_GET['passwordUpdated'])){
        if($_GET['passwordUpdated']=="true"){ ?>
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto colorRight">Succès</div>
          </div>
      <?php 
        }elseif($_GET['passwordUpdated']=="false"){?>
      
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto colorWrong">Erreur</div>
          </div>
        <?php }         
      } ?>
           
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form name="userPasswordUpdate" id="userPasswordUpdate" method="post" action="index.php?page=user_infos_update&what=userPasswordUpdate" novalidate>
          <div class="control-group">
            <div class="form-group controls">
              <label>Mot de passe actuel</label>
              <input type="password" class="form-control" name="actualPassword" id="actualPassword" placeholder="Ancien mot de passe">
              <label>Nouveau mot de passe</label>
              <div class="row">
                <div class="col-lg-6">
                  <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Nouveau mot de passe">
                </div>
                <div class="col-lg-6">
                  <input type="password" class="form-control" name="newPasswordCheck" id="newPasswordCheck" placeholder="Vérification mot de passe">
                </div>
              </div>
            </div>
          </div>        
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="userConnectionButton" id="userConnectionButton">
              <i class="fas fa-edit"></i>
              <span> Modifier</span>
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <a class="col-lg-3 mx-auto buttonColorDelete" href="index.php?page=user_delete&user_id=<?= $user->id() ?>" id="userDeleteButton">
        <i class="fas fa-times-circle"></i>
        <span> Effacer mon compte</span>
      </a>

    </div>
  </div>
  
  <!-- Footer -->    
  <?php require_once('view/frontEnd/footer.php');?>
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
  }else{
    header("Location: index.php");
  }