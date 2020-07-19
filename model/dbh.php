<?php
  defined("_Can_access_") or die("Inclusion directe non autorisée");
function dbConnect()
{
	try
	{
	    $dbh = new PDO('mysql:host=localhost;dbname=billet_pour_l_alaska;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
	return $dbh;
}
