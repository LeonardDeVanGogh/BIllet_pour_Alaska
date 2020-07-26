<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');
require_once('controler/frontend/protect_access.php');
if(!isset($permission)){
	header("location:index.php?page=home");
	die();
}


$database = new Database();
$dbh = $database->getConnection();

$role = $_GET['what'];
$userManager = new UserManager($dbh);
$userInfos = $userManager->readUser($_SESSION['userEmail']);
while($donnees = $userInfos->fetch()){
	$user = new User($donnees);
}

if ($role=="userNameUpdate"){
	$userManager->updateName($user->id(),$_POST['userName']);
	header("Location:index.php?page=session");

}

if ($role=="userEmailUpdate"){
	$userEmailToCheck = $userManager->emailOccurrence($_POST['userEmail']);	
	while($donnees = $userEmailToCheck->fetch()){
		$emailOccurrence = $donnees['count'];				
	}

	if($emailOccurrence==0){
		$userManager->updateEmail($user->id(),$_POST['userEmail']);
		$_SESSION['userEmail'] = $_POST['userEmail'];
		header("location:index.php?page=session&email=" . $_POST['userEmail']);	
	}
	elseif($emailOccurrence==1) {
		$userEmailToCheck = $userManager->readUser($_POST['userEmail']);
		while($donnees = $userEmailToCheck->fetch()){
			$userToCheck = new User($donnees);
		}
		
		if($userToCheck->email()==$user->email()){
			$userManager->updateEmail($user->id(),$_POST['userEmail']);
			$_SESSION['userEmail'] = $_POST['userEmail'];
			header("location:index.php?page=session&email=" . $_POST['userEmail']);	
		}else{
			header("location:index.php?page=session&emailAlreadyUsed=true");
		}
	}		

}

if ($role=="userPasswordUpdate"){
	if($_POST['actualPassword']!="" && $_POST['newPassword']!="" && $_POST['newPassword']===$_POST['newPasswordCheck']){
		$password = password_hash($_POST['newPasswordCheck'], PASSWORD_DEFAULT);
		$userManager->updatePassword($user->id(),$password);
		header("location:index.php?page=session&passwordUpdated=true");
	}else{
		header("location:index.php?page=session&passwordUpdated=false");
	}
}
