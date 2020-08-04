<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
	class FrontEndControler
	{

		public function home()
		{
			require('view/frontEnd/home.php');
		}
		public function billet()
		{
			require('view/frontEnd/billet.php');
		}
		public function login()
		{
			require('view/frontEnd/login.php');
		}
		public function inscription()
		{
			require('view/frontEnd/inscription.php');
		}
		public function session()
		{
			require('view/frontEnd/session.php');
		}
		public function contact()
		{
			require('view/frontEnd/contact.php');
		}
		public function userInfosUpdate()
		{
			require('controler/frontEnd/user_infos_update.php');
		}
		public function addComment()
		{
			require("controler/frontEnd/add_comment.php");
		}
		public function userInscription()
		{
			require("controler/frontEnd/user_inscription.php");
		}
		public function userConnection()
		{
			require("controler/frontEnd/user_connection.php");
		}		
		public function userDisconnection()
		{
			require("controler/frontEnd/user_disconnection.php");
		}
		public function report_comment()
		{
			require("controler/frontEnd/report_comment.php");
		}
		public function userDelete()
		{
			require("controler/frontEnd/user_delete.php");
		}
	}

?>