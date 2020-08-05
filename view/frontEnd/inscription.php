<?php
  defined("_Can_access_") or die("Inclusion directe non autorisée");
  $user = (isset($_GET['user']))?$_GET['user']:'';
  $email = (isset($_GET['email']))?$_GET['email']:'';
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
    <meta property="og:url" content="http://www.billetpourlalaska.com?page=inscription" />
    <meta property="og:image" content="http://www.billetpourlalaska.com/img/inscription-background.jpg" />
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
    <header class="masthead" style="background-image: url('img/inscription-background.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Inscription</h1>
              <span class="subheading">Envie de nous rejoindre ?</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <?php echo (isset($_GET['missingField']))? '<div class=row><div class="col-lg-12 text-center colorWrong">tous les champs doivent être rempli</div></div>' : '';?>
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <form name="userInscriptionForm" id="userInscriptionForm" method="post" action="index.php?page=user_inscription" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Quel pseudonyme desirez-vous?</label>
                <?php echo '<input type="text" class="form-control" placeholder="Pseudonyme" name="userInscription" id="userInscription" required data-validation-required-message="Please enter your pseudonyme." value="' . $user . '" autofocus>';?>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <?php echo (isset($_GET['emailALreadyExist']))? '<div class=row><div class="col-lg-12 text-center colorWrong">l\'email utilisé est déjà utilisé</div></div>' : '';?>
                <label>veuillez inserer votre adresse email:</label>
                <?php echo'<input type="email" class="form-control" name="userEmailInscription" id="userEmailInscription" placeHolder="email" required data-validation-required-message="Please enter your email address." value="' . $email . '">';?>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <?php echo (isset($_GET['mismatchPassword']))? '<div class=row><div class="col-lg-12 text-center colorWrong">le mot de passe que vous avez tapé ne correspond pas</div></div>' : '';?>
                <label>Veuillez saisir un mot de passee</label>
                <input type="password" class="form-control" name="userPasswordInscription" id="userPasswordInscription" placeholder="Mot de passe" required data-validation-required-message="Please enter your password.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <?php echo (isset($_GET['mismatchPassword']))? '<div class=row><div class="col-lg-12 text-center colorWrong">le mot de passe que vous avez tapé ne correspond pas</div></div' : '';?>
                <label>Veuillez confirmer le mot de passe</label>
                <input type="password" class="form-control" name="userPasswordInscriptionConfirmation" id="userPasswordInscriptionConfirmation" placeholder="Confirmation mot de passe" required data-validation-required-message="Please confirm your password.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Inscription</button>
            </div>
          </form>
        </div>
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
