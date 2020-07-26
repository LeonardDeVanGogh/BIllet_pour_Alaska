<?php
  defined("_Can_access_") or die("Inclusion directe non autorisée");
class ArticleManager
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

    public function readAll()
    {    
        $req = $this->_dbh->query("SELECT a.id AS id, a.title, a.article, a.description, a.date_article, a.auteur, a.picture_name, u.id AS user_id, u.user FROM article a LEFT JOIN users u ON a.auteur = u.id ORDER BY a.id DESC");
        return $req;
    }
    public function readOne($id)
    {
        $req = $this->_dbh->prepare("SELECT a.id AS id, a.title, a.description, a.article, a.date_article, a.auteur, a.picture_name, u.id AS user_id, u.user FROM article a LEFT JOIN users u ON a.auteur = u.id WHERE a.id = :id");
        $req->execute(array(
            'id' => $id,
            ));
        return $req;
    }
    public function readLastId()
    {
        $req =  $this->_dbh->query("SELECT id, title, description, article, date_article, picture_name FROM article ORDER BY id DESC LIMIT 0, 1");
        return $req;

    }
    public function createArticle($article_title,$article_description,$article_body,$user_name)
    {
        $req = $this->_dbh->prepare('INSERT INTO article(title, description, article, auteur) VALUES(:title, :description, :article, :auteur)');
        $req->execute(array(
            'title'=> $article_title,
            'description' => $article_description,
            'article' => $article_body,
            'auteur' => $user_name,
        ));
    }
    public function updateArticle($articleId,$articleTitle,$articleDescription,$articleBody,$user_name)
    {
        $req= $this->_dbh->prepare("UPDATE article SET title = :articleTitle, description = :articleDescription, article = :articleBody,modified = :modified, modified_by = :user_name WHERE id= :id");
            $req->execute(array(
            'articleTitle' => $articleTitle,    
            'articleDescription' => $articleDescription,   
            'articleBody' => $articleBody,    
            'id' => $articleId,
            'modified' => date("Y-m-d H:i:s"),
            'user_name' => $user_name,
        ));
    }
    public function updatePictureName($id,$pictureName){
        $req= $this->_dbh->prepare("UPDATE article SET picture_name = :pictureName WHERE id= :id");
            $req->execute(array(
            'pictureName' => $pictureName,    
            'id' => $id,
        ));
    }

    public function deleteArticle($id_article)
    {
        $req= $this->_dbh->prepare("DELETE FROM article WHERE id= :id");
            $req->execute(array(
            'id' => $id_article,
        ));
    }
}