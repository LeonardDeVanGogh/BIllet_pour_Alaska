<?php

	class BackEndControler
	{
		public function administration()
		{
			require("view/backend/administration.php");
		}
		public function report_comment()
		{
			require("controler/backend/report_comment.php");
		}
		public function addComment()
		{
			require("controler/backend/addComment.php");
		}
		public function deleteComment()
		{
			require("controler/backend/delete_comment.php");
		}
		public function hideComment()
		{
			require("controler/backend/hide_comment.php");
		}
		public function manageBillet()
		{
			require("view/backend/manage_billet.php");
		}
		public function creationArticle()
		{
			require("controler/backend/creation_article.php");
		}
		public function deleteArticle()
		{
			require("controler/backend/delete_article.php");
		}
		public function userConnection()
		{
			require("controler/backend/user_connection.php");
		}
		public function userInscription()
		{
			require("controler/backend/user_inscription.php");
		}
		public function userDisconnection()
		{
			require("controler/backend/user_disconnection.php");
		}
		public function rankAdministration()
		{
			require("view/backend/rank_administration.php");
		}
		public function userRankAdministration()
		{
			require("controler/backend/user_rank_administration.php");
		}


		
	}

?>