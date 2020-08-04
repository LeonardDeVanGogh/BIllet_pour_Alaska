<?php
  defined("_Can_access_") or die("Inclusion directe non autorisée");
  spl_autoload_register('chargerClasse');

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
  <meta property="og:url" content="http://www.billetpourlalaska.com" />
  <meta property="og:image" content="http://www.billetpourlalaska.com/img/home-background.jpg" />
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

<?php require_once('view/frontEnd/entete.php');?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-background.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Billet pour l'Alaska</h1>
            <span class="subheading">Bienvenue sur mon blog</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <?php 
      if(isset($permission) && $permission->article_add()==1){ ?>
        <div class="row">
          <a role="button" class="col-lg-6 mx-auto controls fas fa-file-alt fa-3x addArticle" aria-haspopup="true" aria-expanded="false" title="nouvel article" href="index.php?page=manage_billet&id_article=0"> Nouvel Article</a>
        </div>
  </div>
    <?php 
      } 
    ?>
    

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php            
            $manager = new ArticleManager($dbh);
            $nbArticles  = $manager->readAll();
            while($donnees = $nbArticles->fetch())
            {
              $article = new Article($donnees);
              ?>
                <div class="post-preview">
                  <a href="index.php?page=billet&id_article=<?= $article->id()?> ">
                    <h2 class="post-title">
                      <?=  $article->title() ?>
                    </h2>
                    <h3 class="post-subtitle">
                      <?= $article->description() ?>
                    </h3>
                  </a>
                  <p class="post-meta">Posted by
                    <a href="#"><?= $article->user() ?></a>
                    on <?= $article->date_article() ?></p>
                </div>
                <hr>
              <?php
            }
        ?>

        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
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
