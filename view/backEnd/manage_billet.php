<?php


spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

$articleManager = new ArticleManager($dbh);

if(isset($_SESSION['userRank'])){
  $userRankAdministration = new RankManager($dbh);        
  $nbActions = $userRankAdministration->rankAdministration($_SESSION['userRank']);
  while($donnees = $nbActions->fetch()) {
    $permission = new Rank($donnees);   
  }
}

if ( isset($_GET['id_article']) && filter_var($_GET['id_article'], FILTER_VALIDATE_INT))
            {
                
                $nbArticles  = $articleManager->readOne($_GET['id_article']);

                while($donnees = $nbArticles->fetch()) {

                    $article = new Article($donnees);
                  }
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

  <script src="https://cdn.tiny.cloud/1/ypwliom0bi85nrsoa2vh7c8n0wu9zwclv0khn8wnrdph8i5r/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>

</head>

<body>

  <!-- Navigation -->
  <?php require_once('view/frontend/entete.php');?>



<div class="container" id="manageArticle">
  <div class="row col-lg-12 justify-content-center">
    <form name="article" class="col-lg-12" id="article" method="post" enctype="multipart/form-data" action="index.php?page=creation_article" novalidate>
      <div class="control-group">
        <div class="form-group floating-label-form-group controls">
          <label>titre de l'article</label>
          <?php 
            echo '<input id="articleTitle" name="articleTitle" placeholder="titre article" value="'; 
            if(isset($article)){echo $article->title();};
            echo '">';
          ?>
        </div>
        <div class="form-group floating-label-form-group controls">
          <label>descriptif article</label>
          <?php 
            echo '<input id="articleDescription" name="articleDescription" placeholder="descriptif article" value="'; 
            if(isset($article)){echo $article->description();};
            echo '">';
          ?>
        </div>
        <div class="form-group floating-label-form-group controls">
          <label>image</label>
          <input type="file" id="articlePicture" name="articlePicture">
        </div>
        <div class="form-group floating-label-form-group controls">
          <label></label>
          <?php 
            echo '<textarea id="articleBody" name="articleBody">'; 
            if(isset($article)){echo $article->article();}
            else{echo 'mon article ici';};
            echo '</textarea>';
          ?>
        </div>
        <div class="form-group floating-label-form-group controls">
          <?php echo '<input type="hidden" id="articleId" name="articleId" value="';
          if (isset($article)){echo $article->id();}else{echo 0;};
          echo'">'; ?>
        </div>
        
      </div>
      <div class="form-group">
        <button role="button" type="submit" class="far fa-envelope" id="billet">add/update</button>
      </div>
    </form>
  </div>
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
