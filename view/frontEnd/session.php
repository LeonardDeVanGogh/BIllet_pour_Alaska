<?php
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

if(isset($_SESSION['userRank'])){
  $userRankAdministration = new RankManager($dbh);        
  $nbActions = $userRankAdministration->rankAdministration($_SESSION['userRank']);
  while($donnees = $nbActions->fetch()) {
    $permission = new Rank($donnees);   
  }
}
$userManager = new UserManager($dbh);
$userInfos = $userManager->readUser($_SESSION['userEmail']);
while ($donnees = $userInfos->fetch()){
  $user = new User($donnees);
}


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
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form name="userNameUpdate" id="userNameUpdate" method="post" action="index.php?page=userInfosUpdate&what=userNameUpdate" novalidate>
          <div class="control-group">
            <div class="form-group controls">
              <label>Modifier pseudonyme</label>
              <?php echo '<input type="text" class="form-control" name="userName" id="userName" value="' . $user->user() . '" required data-validation-required-message="Please enter your email address.">';?>
              <p class="help-block text-danger"></p>
            </div>
          </div>        
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="userConnectionButton" id="userConnectionButton">Update</button>
          </div>
        </form>
      </div>
    </div>
    <?php 
      if (isset($_GET['emailAlreadyUsed'])){
        echo '<div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">email déjà utilisé</div>
              </div>';
      }
    ?>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form name="userEmailUpdate" id="userEmailUpdate" method="post" action="index.php?page=userInfosUpdate&what=userEmailUpdate" novalidate>
          <div class="control-group">
            <div class="form-group controls">
              <label>Modifier email</label>
              <?php echo '<input type="text" class="form-control" name="userEmail" id="userName" value="' . $_SESSION['userEmail'] . '" required data-validation-required-message="Please enter your email address.">';?>
              <p class="help-block text-danger"></p>
            </div>
          </div>        
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="userConnectionButton" id="userConnectionButton">Update</button>
          </div>
        </form>
      </div>
    </div>
    <?php 
      if (isset($_GET['passwordUpdated'])){
        if($_GET['passwordUpdated']=="true"){
          echo '<div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">Succès</div>
              </div>';
        }elseif($_GET['passwordUpdated']=="false"){
          echo '<div class="row">
                  <div class="col-lg-8 col-md-10 mx-auto">Erreur</div>
                </div>';
        }
        
      }
    ?>
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form name="userPasswordUpdate" id="userPasswordUpdate" method="post" action="index.php?page=userInfosUpdate&what=userPasswordUpdate" novalidate>
          <div class="control-group">
            <div class="form-group controls">
              <label>Mot de passe actuel</label>
              <input type="password" class="form-control" name="actualPassword" id="actualPassword" placeholder="Ancien mot de passe">
              <label>Nouveau mot de passe</label>
              <div class="row">
                <div class="col">
                  <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="Nouveau mot de passe">
                </div>
                <div class="col">
                  <input type="password" class="form-control" name="newPasswordCheck" id="newPasswordCheck" placeholder="Vérification mot de passe">
                </div>
              </div>
              
              <p class="help-block text-danger"></p>
            </div>
          </div>        
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="userConnectionButton" id="userConnectionButton">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  
  <!-- Footer -->    
  <?php require_once('view/frontend/footer.php');?>
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