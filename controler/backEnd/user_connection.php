<?php


spl_autoload_register('chargerClasse');
try
{
    $dbh = new PDO('mysql:host=localhost;dbname=billet_pour_l_alaska;charset=utf8', 'root', '');

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

if ($_POST['userEmail']!='' && $_POST['passwordLogin']!='')
{

	$manager = new UserManager($dbh);
	$email = $_POST['userEmail'];
	$thisUser = $manager->readUser($email);
	if($thisUser->rowcount()==0)
	{
		header("Location: index.php?page=inscription");
	}
	else
	{
		while($donnees = $thisUser->fetch()){
			$user = new User($donnees);
			$_SESSION['userName'] = $user->user();
			$_SESSION['userRank'] = $user->rank();
			header("Location: index.php?page=session");
			
			
		}
	}
	
}
else
{
	header("Location: index.php?page=login");
}


