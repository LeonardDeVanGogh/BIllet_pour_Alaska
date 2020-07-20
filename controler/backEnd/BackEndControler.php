<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
	class BackEndControler
	{
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
		public function rankAdministration()
		{
			require("view/backend/rank_administration.php");
		}
		public function userRankAdministration()
		{
			require("controler/backend/user_rank_administration.php");
		}
		public function userAdministration()
		{
			require("view/backend/user_administration.php");
		}
		public function userManagement()
		{
			require("controler/backend/user_management.php");
		}		
		public function commentModeration()
		{
			require("view/backend/comment_moderation.php");
		}
		public function validateComment()
		{
			require("controler/backend/validate_comment.php");
		}
		
	}

?>