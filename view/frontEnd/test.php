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
  $userRankAdministration = new userManager($dbh);        
    $nbActions = $userRankAdministration->rankAdministration($_SESSION['userRank']);
    while($donnees = $nbActions->fetch()) {
      $permission = new Rank($donnees);
     echo 'ici mon texte ' . $permission->comment_moderation(); 
    }

}