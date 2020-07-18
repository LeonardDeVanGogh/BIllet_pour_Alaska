<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
spl_autoload_register('chargerClasse');

try
{
    $dbh = new PDO('mysql:host=localhost;dbname=billet_pour_l_alaska;charset=utf8', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$articleTitle =  $_POST['articleTitle'];
$articleDescription = $_POST['articleDescription'];
$articleBody = $_POST['articleBody'];
$articleId =  $_POST['articleId'];
$userName= $_SESSION['userName'];

$articleManager = new articleManager($dbh);

if ($articleId==0){
	$articleManager->createArticle($articleTitle,$articleDescription,$articleBody,$userName);
	 $lastArticle = $articleManager->readLastId();
	 
	 while($donnees = $lastArticle->fetch()) {
        $article = new Article($donnees);
        $article->savePicture();
        echo $article->pictureName();
        $articleManager->updatePictureName($article->id(),$article->pictureName());                                        
    }

}else{
	$articleManager->updateArticle($articleId,$articleTitle,$articleDescription,$articleBody,$userName);
	$oneArticle = $articleManager->readOne($articleId);
	 
	 while($donnees = $oneArticle->fetch()) {
        $article = new Article($donnees);
        $article->savePicture($article->pictureName());
        echo $article->pictureName();
        } 
}

header("Location: index.php?page=manage_billet");

?>