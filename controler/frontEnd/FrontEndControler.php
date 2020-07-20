<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
	class FrontEndControler
	{

		public function home()
		{
			require('view/frontend/home.php');
		}
		public function billet()
		{
			require('view/frontend/billet.php');
		}
		public function login()
		{
			require('view/frontend/login.php');
		}
		public function inscription()
		{
			require('view/frontend/inscription.php');
		}
		public function session()
		{
			require('view/frontend/session.php');
		}
		public function contact()
		{
			require('view/frontend/contact.php');
		}
		public function userInfosUpdate()
		{
			require('controler/frontend/user_infos_update.php');
		}
		public function addComment()
		{
			require("controler/frontend/add_comment.php");
		}
		public function userInscription()
		{
			require("controler/frontend/user_inscription.php");
		}
		public function userConnection()
		{
			require("controler/frontend/user_connection.php");
		}		
		public function userDisconnection()
		{
			require("controler/frontend/user_disconnection.php");
		}
		public function report_comment()
		{
			require("controler/frontend/report_comment.php");
		}
		public function userDelete()
		{
			require("controler/frontend/user_delete.php");
		}
	}

?>