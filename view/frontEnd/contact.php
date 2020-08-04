
<?php
  defined("_Can_access_") or die("Inclusion directe non autorisée");

  $database = new Database();
  $dbh = $database->getConnection();

  require_once('controler/frontEnd/protect_access.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Blog">
  <meta name="author" content="Jean Forteroche">
  <meta property="og:title" content="Billet pour l'Alaska" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="http://www.billetpourlalaska.com?page=contact" />
  <meta property="og:image" content="http://www.billetpourlalaska.com/img/contact-bg.jpg" />
  <meta property="og:site_name" content="http://www.billetpourlalaska.com" />
  <title>BIllet pour l'Alaska</title>
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
  <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contactez nous</h1>
            <span class="subheading">Vous avez un question? J'ai la réponse.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Envie de nous écrire ? complétez le formulaire ci-bas pour nous envoyer un message, nous reviendrons vers vous au plus vite!</p>
      </div>
      <div class="container">
        <?php 
          if(isset($_GET['missingField'])){
            ?> <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto colorWrong">Tous les champs doivent être remplis</div>
            </div> <?php
          }
          if(isset($_GET['messageSent'])){
            ?> <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto colorRight">Message Envoyé</div>
            </div> <?php
          }
        ?>
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <form name="contactForm" id="contactForm" method="post" action="index.php?page=contact_mail" novalidate>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Nom</label>
                  <input type="text" class="form-control" name="name" id="name" placeHolder="Nom" autofocus>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" id="email" placeHolder="Email">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Télephone</label>
                  <input type="tel" class="form-control" name="phone" id="phone" placeHolder="Télephone">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label>Message</label>
                  <input type="text" class="form-control" name="message" id="message" placeHolder="Message">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="contactFormButton" id="contactFormButton">Envoyer</button>
              </div>
            </form>
          </div>
        </div>
      </div>      
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <?php require_once('view/frontEnd/footer.php');?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
