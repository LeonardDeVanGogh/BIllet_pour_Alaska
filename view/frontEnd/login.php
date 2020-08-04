<?php
  defined("_Can_access_") or die("Inclusion directe non autorisée");
  $email = (isset($_GET['email'])) ? $_GET['email'] : "";
?>

<!DOCTYPE html>
<html lang="fr">

<head> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog">
    <meta name="author" content="Jean Forteroche">
    <meta property="og:title" content="Billet pour l'Alaska" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.billetpourlalaska.com?page=login" />
    <meta property="og:image" content="http://www.billetpourlalaska.com/img/connection-background.jpg" />
    <meta property="og:site_name" content="http://www.billetpourlalaska.com" />
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

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/connection-background.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>connexion</h1>
            <span class="subheading">Connectez vous pour accéder à votre espace privé?</span>
          </div>
        </div>
      </div>
    </div>
  </header> 

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php echo (isset($_GET['infos']))? '<div class="row"><div class="col-lg-10 text-center colorWrong">tous les champs doivent être complétés</div></div>':'';?>
        <form name="userConnectionForm" id="userConnectionFrom" method="post" action="index.php?page=user_connection" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Quel est votre nom utilisateur?</label>
              <?php echo '<input type="text" class="form-control" name="userEmail" id="userEmail" placeHolder="email" value="' . $email . '" autofocus>';?>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <?php echo (isset($_GET['password']))? '<div class="row"><div class="col-lg-6 colorWrong">mot de passe incorrect</div></div>':'';?>
              <label>Quel est votre mot de passe?</label>
              <input type="password" class="form-control" name="passwordLogin" id="passwordLogin" placeHolder="Mot de passe" required data-validation-required-message="Please enter your password.">
              <p class="help-block text-danger"></p>
            </div>
          </div>         
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="userConnectionButton" id="userConnectionButton">Connexion</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
       <a href="index.php?page=inscription" class="col-lg-8 col-md-10 mx-auto">Inscription</a>
   </div>
  </div>

  <hr>

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

 
