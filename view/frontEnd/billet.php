<?php

defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();

require_once('controler/frontEnd/protect_access.php');
  if (filter_var($_GET['id_article'], FILTER_VALIDATE_INT) && $_GET['id_article']>=1)
  {
    $manager = new ArticleManager($dbh);
    $nbArticles  = $manager->readOne($_GET['id_article']);

    while($donnees = $nbArticles->fetch()) {
      $article = new Article($donnees);
?>

<!DOCTYPE html>
<html lang="en">


<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta property="og:title" content="Billet pour l\'Alaska: <?= $article->title() ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="http://www.billetpourlalaska.com/index.php?page=billet&id_article=<?= $article->id() ?>" />
  <?php echo '<meta property="og:image" content="http://www.billetpourlalaska.com/img/' . $article->pictureName() . '" />' ;?>
  <?php echo'<meta property="og:site_name" content="Billet pour l\'Alaska: ' . $article->title() . '" />' ;?>


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
  <?php 
  require_once('view/frontEnd/entete.php');



       ?>
      <!-- Page Header -->
      <header class="masthead" style="background-image: url('img/<?= $article->pictureName() ?>')">
        <div class="overlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
              <div class="post-heading">
                <h1><?= $article->title() ?></h1>
                <h2 class="subheading"><?= $article->description() ?></h2>
                <span class="meta">Posted by
                  <a href="#"><?= $article->user() ?></a>
                  on <?= $article->date_article() ?></span>
                </div>
              </div>
            </div>
          </div>
        </header>

        <!-- Article Dashboard -->
        <div class="container">
          <div class="row justify-content-center col-lg-8 mx-auto">
            <?php if (isset($permission) && $permission->article_update()==1){ ?>
            <a role="button" class="col-lg-4 controls text-center align-middle buttonColorUpdate" aria-haspopup="true" aria-expanded="false" title="update article" href="index.php?page=manage_billet&id_article=<?= $article->id() ?>">
              <i class="fas fa-edit fa-1x"></i>
              <span>Editer Article</span>
            </a>
            <?php }
            if (isset($permission) && $permission->article_delete()==1){ ?>
            <a role="button" class="col-lg-4 controls text-center buttonColorDelete" aria-haspopup="true" aria-expanded="false" title="supprimer article" href="index.php?page=delete_article&id_article=<?= $article->id() ?>">
              <i class="fas fa-times-circle fa-1x"></i>
              <span>Effacer Article</span>
            </a>
            <?php } ?>

          </div>
        </div>

        <!-- Article Content -->
        <article>
          <div class="container article">                
            <div class="row">
              <div class="col-lg-8 col-md-10 mx-auto">
                <?= $article->article() ?>
              </div>
            </div>
          </div>
        </article>';

        <?php
      } ?>

      <!-- Add Comment -->
      <div class="container">
        <div class="row col-lg-12 justify-content-center">
          <form name="newComment" class="col-lg-6" id="newComment" method="post" action="index.php?page=add_comment" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label></label>
                <input type="textarea" class="form-control" name="addComment" placeHolder="écrivez votre commentaire ici" required data-validation-required-message="merci d'écrire votre commentaire">
                <p class="help-block text-danger"></p>
              </div>
              <?php echo '<input type="hidden" name="articleId" value="' . $article->id() . '">' ?>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendCommentButton">
                <i class="fas fa-envelope"></i>
                <span> Envoyer</span>
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Comments -->
      <div class="container" style="background-image: url('img/comment-background.jpg')">
        <?php
        $commentManager = new CommentManager($dbh);
        $idArticle = $_GET['id_article'];
        $nbComments  = $commentManager->readComment($_GET['id_article']);
        while ($donnees = $nbComments->fetch()){
          include('view/frontEnd/comment.php');
        }?>

      </div>
    </div>
    <!-- Footer -->
    <?php require_once('view/frontEnd/footer.php');?>    
    <?php
  }else{
    header("location:index.php?page=home");
  } ?>

  <hr>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
