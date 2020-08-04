<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
	class BackEndControler
	{
		public function deleteComment()
		{
			require("controler/backEnd/delete_comment.php");
		}
		public function hideComment()
		{
			require("controler/backEnd/hide_comment.php");
		}
		public function manageBillet()
		{
			require("view/backEnd/manage_billet.php");
		}
		public function creationArticle()
		{
			require("controler/backEnd/creation_article.php");
		}
		public function deleteArticle()
		{
			require("controler/backEnd/delete_article.php");
		}		
		public function rankAdministration()
		{
			require("view/backEnd/rank_administration.php");
		}
		public function userRankAdministration()
		{
			require("controler/backEnd/user_rank_administration.php");
		}
		public function userAdministration()
		{
			require("view/backEnd/user_administration.php");
		}
		public function userManagement()
		{
			require("controler/backEnd/user_management.php");
		}		
		public function commentModeration()
		{
			require("view/backEnd/comment_moderation.php");
		}
		public function validateComment()
		{
			require("controler/backEnd/validate_comment.php");
		}
		
	}

?>