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

echo 'test';


if ($_POST['userInscription']!='' && $_POST['userEmailInscription']!='' && $_POST['userPasswordInscription']!='' && $_POST['userPasswordInscriptionConfirmation']!=''){
	$user = $_POST['userInscription'];
	$email = $_POST['userEmailInscription'];
	$password = $_POST['userPasswordInscription'];
	$passwordVerification = $_POST['userPasswordInscriptionConfirmation'];

	$newUser = new User(array('user'=>$user,'email'=>$email,'password'=>$password));
	
	$manager = new UserManager($dbh);

	$manager->createUser($user, $email, $password);


}




