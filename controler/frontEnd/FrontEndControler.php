<?php

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
		public function publications()
		{
			require('view/frontend/publications.php');
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
			require('controler/frontend/userInfosUpdate.php');
		}
	}

?>