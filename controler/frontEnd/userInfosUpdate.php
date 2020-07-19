<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
spl_autoload_register('chargerClasse');
  require_once('controler/frontend/protect_access.php');
  if (isset($permission)){
 

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
		echo 'tout va bien';
		$userManager->updatePassword($user->id(),$_POST['newPasswordCheck']);
		header("location:index.php?page=session&passwordUpdated=true");
	}else{
		header("location:index.php?page=session&passwordUpdated=false");
	}
	
}
  }else {
    header("Location: index.php");
  }
