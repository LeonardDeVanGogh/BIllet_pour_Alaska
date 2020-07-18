<?php

class RankManager
{
    private $_dbh;

    public function __construct($dbh)
    {
        $this->setDbh($dbh);
    }

    public function setDbh($dbh)
    {
        $this->_dbh = $dbh;
    }

	public function rankAdministration($rank)
	{

		$req = $this->_dbh->prepare("SELECT * FROM rank WHERE rank=:rank");
		$req->execute(array(
			'rank' => $rank,
			));
		return $req;		
	}

	public function rankUpdate($commentModeration,$commentHidden,$commentDelete,$articleAdd,$articleUpdate,$articleDelete,$userAdministration,$rankUpdate,$userRankUpdate,$rank){
		$req= $this->_dbh->prepare("UPDATE rank SET comment_moderation = :comment_moderation, comment_hidden = :comment_hidden, comment_delete = :comment_delete, user_administration = :user_administration, article_add = :article_add, article_update = :article_update, article_delete = :article_delete, rank_update = :rank_update, user_rank_update = :user_rank_update WHERE rank= :rank");
            $req->execute(array(
            'comment_moderation' => $commentModeration,
            'comment_hidden' => $commentHidden,
            'comment_delete' => $commentDelete,
            'article_add' => $articleAdd,
            'article_update' => $articleUpdate,
            'article_delete' => $articleDelete,
            'user_administration' => $userAdministration,
            'rank_update' => $rankUpdate,
            'user_rank_update' => $userRankUpdate,    
            'rank' => $rank,   
        ));
	}
}

