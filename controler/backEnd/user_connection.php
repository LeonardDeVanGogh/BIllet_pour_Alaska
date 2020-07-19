<?php


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
			if ($donnees['password']===$_POST['passwordLogin']){
				$user = new User($donnees);

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


