<?php

if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['message'])){
	header("location:index.php?page=contact&missingField=true");
}else {
	$name = strip_tags(htmlspecialchars($_POST['name']));
	$email_address = strip_tags(htmlspecialchars($_POST['email']));
	$phone = strip_tags(htmlspecialchars($_POST['phone']));
	$message = strip_tags(htmlspecialchars($_POST['message']));
	mail('contact@billetpourlalaska.com', 'Contact de Billet pour l\'Alaska de: ' . utf8_decode($name), 
		'email: ' . utf8_decode($email) . "\n" .
		'phone number: ' . $phone . "\n" .
		"Message: " . utf8_decode($message)
		);
	header("location:index.php?page=contact&messageSent=true");
}