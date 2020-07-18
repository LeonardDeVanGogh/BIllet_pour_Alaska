<?php
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);

spl_autoload_register('chargerClasse');

try
{
    $dbh = new PDO('mysql:host=localhost;dbname=billet_pour_l_alaska;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));

}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$user = $_POST['userInscription'];
$email = $_POST['userEmailInscription'];
$password = $_POST['userPasswordInscription'];
$passwordConfirmation = $_POST['userPasswordInscriptionConfirmation'];

$userManager = new UserManager($dbh);
$userExist = $userManager->readUser($email);


if ($user!='' && $email!='' && $password!='' && $passwordConfirmation!=''){
	$userManager = new UserManager($dbh);
	$userExist = $userManager->readUser($email);
	if ($userExist->rowCount()==0){
		if ($password === $passwordConfirmation){
			$userManager->createUser($user, $email, $password);
			header("Location: index.php?page=login&email=" . $email);
		}else{
			header("Location: index.php?page=inscription&user=" . $_POST['userInscription'] . "&email=" . $email . "&mismatchPassword=true");
		}		
	
	}else{
		header("Location: index.php?page=inscription&user=" . $_POST['userInscription'] . "&emailALreadyExist=true");
	}
	
}else{
	header("Location: index.php?page=inscription&missingField=true");
}





