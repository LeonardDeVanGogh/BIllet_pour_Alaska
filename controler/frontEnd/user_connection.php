<?php

defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');

$database = new Database();
$dbh = $database->getConnection();


if ($_POST['userEmail']!='' && $_POST['passwordLogin']!='')
{
	$manager = new UserManager($dbh);
	$email = $_POST['userEmail'];
	$thisUser = $manager->readUser($email);
	if($thisUser->rowcount()!==0)
	{
		while($donnees = $thisUser->fetch()){
			if (password_verify($_POST['passwordLogin'], $donnees['password'])){
				$user = new User($donnees);
				$_SESSION['userId'] = $user->id();
				$_SESSION['userEmail'] = $user->email();
				$_SESSION['userRank'] = $user->rank();
				header("Location: index.php?page=home");
			}else{
				header("Location: index.php?page=login&password=false");
			}									
		}		
	}else{
		header("Location: index.php?page=inscription&email=" . $_POST['userEmail']);
	}	
}else{
	header("Location: index.php?page=login&infos=empty");
}


