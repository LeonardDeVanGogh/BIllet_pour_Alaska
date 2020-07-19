<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
  if(!isset($database)){
    $database = new Database();
    $dbh = $database->getConnection();
  }
  
  if(isset($_SESSION['userRank']) && $_SESSION['userRank']!=""){
    $userRankAdministration = new RankManager($dbh);        
    $nbActions = $userRankAdministration->rankAdministration($_SESSION['userRank']);
    while($donnees = $nbActions->fetch()) {
      $permission = new Rank($donnees);   
    }
  }else{
    if($_GET['page']=!"home"){
      header("Location:index.php");
    }    
  }