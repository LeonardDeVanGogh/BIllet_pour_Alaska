<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
class Rank extends User
{
    protected $_comment_moderation;
    protected $_comment_hidden;
    protected $_comment_delete;
    protected $_article_add;
    protected $_article_update;
    protected $_article_delete;
    protected $_user_administration;
    protected $_rank_update;
    protected $_user_rank_update;

    public function hydrate(array $donnees){
        foreach($donnees as $key => $value){
            $method = 'set' . ucfirst($key);

            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

    public function __construct($donnees)
    {
        $this->hydrate($donnees);
    }

    public function comment_moderation()
    {
    	return $this->_comment_moderation;
    }
    public function comment_hidden()
    {
        return $this->_comment_hidden;
    }
    public function comment_delete()
    {
        return $this->_comment_delete;
    }
    public function article_add()
    {
        return $this->_article_add;
    }
    public function article_update()
    {
        return $this->_article_update;
    }
    public function article_delete()
    {
        return $this->_article_delete;
    }
    public function rank_update()
    {
        return $this->_rank_update;
    }
    public function user_rank_update()
    {
        return $this->_user_rank_update;
    }
    public function user_administration()
    {
        return $this->_user_administration;
    }


    public function setComment_moderation($comment_moderation)
    {
    	$this->_comment_moderation = $comment_moderation;
    }
    public function setComment_hidden($comment_hidden)
    {
        $this->_comment_hidden = $comment_hidden;
    }
    public function setComment_delete($comment_delete)
    {
        $this->_comment_delete = $comment_delete;
    }
    public function setArticle_add($article_add)
    {
        $this->_article_add = $article_add;
    }
    public function setArticle_update($article_update)
    {
        $this->_article_update = $article_update;
    }
    public function setArticle_delete($article_delete)
    {
        $this->_article_delete = $article_delete;
    }
    public function setRank_update($rank_update)
    {
        $this->_rank_update = $rank_update;
    }
    public function setUser_rank_update($user_rank_update)
    {
        $this->_user_rank_update = $user_rank_update;
    }
    public function setUser_administration($user_administration)
    {
        $this->_user_administration = $user_administration;
    }




}