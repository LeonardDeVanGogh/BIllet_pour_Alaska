<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

if(isset($_SESSION['userRank'])){
  $userRankAdministration = new rankManager($dbh);        
  $nbActions = $userRankAdministration->rankAdministration($_SESSION['userRank']);
  while($donnees = $nbActions->fetch()) {
    $permission = new Rank($donnees);   
  }
}
$commentManager = new CommentManager($dbh);

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
    $reports = $commentManager->readForModeration();


    while($donnees = $reports->fetch()){
      $idArticle = $donnees['id_article'];
      echo '<div class="row col-lg-12 justify-content-center">
              <div class="col-lg-6 mx-auto">
                id_article ' . $donnees['id_article'] . ' / id ' . $donnees['id'] . ' ' . $donnees['report_reason'] . '
              </div>
            </div>';
      include('view/frontend/comment.php');

    }
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