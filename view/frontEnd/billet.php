<?php

ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
spl_autoload_register('chargerClasse');

try
{
    $dbh = new PDO('mysql:host=localhost;dbname=billet_pour_l_alaska;charset=utf8', 'root', '');

}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

if(isset($_SESSION['userRank'])){
  $userRankAdministration = new RankManager($dbh);        
  $nbActions = $userRankAdministration->rankAdministration($_SESSION['userRank']);
  while($donnees = $nbActions->fetch()) {
    $permission = new Rank($donnees);   
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

</head>

<body>

  <!-- Navigation -->
<?php require_once('view/frontend/entete.php');?>



  <?php
            
            if (filter_var($_GET['id_article'], FILTER_VALIDATE_INT))
            {
                $manager = new ArticleManager($dbh);
                $nbArticles  = $manager->readOne($_GET['id_article']);

                while($donnees = $nbArticles->fetch()) {

                    $article = new Article($donnees);


                    echo'<!-- Page Header -->
                          <header class="masthead" style="background-image: url(\'img/' . $article->pictureName() . '\')">
                            <div class="overlay"></div>
                            <div class="container">
                              <div class="row">
                                <div class="col-lg-8 col-md-10 mx-auto">
                                  <div class="post-heading">
                                    <h1>' . $article->title() . '</h1>
                                    <h2 class="subheading">' . $article->description() . '</h2>
                                    <span class="meta">Posted by
                                      <a href="#">' . $article->auteur() . '</a>
                                      on ' . $article->date_article() . '</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </header>

                          <!-- Post Content -->
                          <article>

                            <div class="container article">
                              <div class="row">
                                <div class="col-lg-8 col-md-10 mx-auto">
                                  ' . $article->article() . '
                                </div>
                              </div>
                            </div>
                          </article>';
                    
                }

                $commentManager = new CommentManager($dbh);
                $nbComments  = $commentManager->readComment($_GET['id_article']);

                while($donnees = $nbComments->fetch()) {

                  $comment = new Comment($donnees);

                  echo'
                      <!-- Comment Content -->
                      
                        <div class="container">
                          <div class="row col-lg-12 justify-content-center">
                            <article class="col-lg-4 comment" id="' . $comment->id() . '">
                              <div class="row justify-content-center">
                                <div class="mx-auto">
                                  ' . $comment->comment() . '
                                </div>
                              </div>                            
                              <div class="row justify-content-end">';
                              if (isset($permission) && $permission->comment_hidden()==1){
                                echo '<div class="col-lg-1">
                                  <a role="button" class="controls fas fa-ban" aria-haspopup="true" aria-expanded="false" title="modérer" href="index.php?page=hide_comment&comment_id=' . $comment->id() . '&id_article=' . $article->id() . '"></a>
                                </div>';
                              }
                              if (isset($permission) && $permission->comment_delete()==1){
                                echo '<div class="col-lg-1">
                                  <a role="button" class="controls fas fa-times-circle" aria-haspopup="true" aria-expanded="false" title="supprimer" href="index.php?page=delete_comment&comment_id=' . $comment->id() . '&id_article=' . $article->id() . '"></a>
                                </div>';
                              }
                                
                                echo'
                                <div class="col-lg-2">               
                                  <a role="button" class="controls far fa-flag" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="signaler">(' . $comment->report() . ')</a>
                                    <div class="dropdown-menu" aria-labelledby="menuDeroulant">
                                      <a class="dropdown-item" href="index.php?page=report_comment&comment_id=' . $comment->id() . '&id_article=' . $article->id() . '&report_reason=insulte/injure">insulte/injure</a>
                                      <a class="dropdown-item" href="index.php?page=report_comment&comment_id=' . $comment->id() . '&id_article=' . $article->id() . '&report_reason=propos offensant/racisme">propos offensant/racisme</a>
                                      <a class="dropdown-item" href="index.php?page=report_comment&comment_id=' . $comment->id() . '&id_article=' . $article->id() . '&report_reason=commentaire à caractère politique">commentaire à caractère politique</a>
                                      <a class="dropdown-item" href="index.php?page=report_comment&comment_id=' . $comment->id() . '&id_article=' . $article->id() . '&report_reason=autre">autre</a>
                                    </div>
                                  <a>
                                </div>
                              </div>
                            </article>
                          </div>
                        </div>
                  ';                    
                }

            }
        ?>

        <div class="container">
          <div class="row col-lg-12 justify-content-center">
            <form name="newComment" class="col-lg-6" id="newComment" method="post" action="index.php?page=addComment" novalidate>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label></label>
                  <input type="textarea" class="form-control" name="addComment" placeHolder="écrivez votre commentaire ici" required data-validation-required-message="merci d'écrire votre commentaire">
                  <p class="help-block text-danger"></p>
                </div>
                  <?php echo '<input type="hidden" name="articleId" value="' . $article->id() . '">' ?>
                </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary fas fa-mail" id="sendCommentButton">envoyer</button>
              </div>
            </form>
          </div>
        </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
