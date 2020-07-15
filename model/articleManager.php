<?php

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
        $req =  $this->_dbh->query("SELECT id, title, article, date_article, picture_name FROM article ORDER BY id DESC");
        return $req;

    }
    public function readOne($id)
    {
        $req =  $this->_dbh->query("SELECT id, title, description, article, date_article, picture_name FROM article WHERE id =" . $id);
        return $req;
    }
    public function readLastId()
    {
        $req =  $this->_dbh->query("SELECT id, title, description, article, date_article, picture_name FROM article ORDER BY id DESC LIMIT 0, 1");
        return $req;
    }


    public function createArticle($article_title,$article_description,$article_body)
    {
        $req = $this->_dbh->prepare('INSERT INTO article(title, description, article) VALUES(:title, :description, :article)');
        $req->execute(array(
            'title'=> $article_title,
            'description' => $article_description,
            'article' => $article_body,
        ));
    }
    public function updateArticle($articleId,$articleTitle,$articleDescription,$articleBody)
    {
        $req= $this->_dbh->prepare("UPDATE article SET title = :articleTitle, description = :articleDescription, article = :articleBody WHERE id= :id");
            $req->execute(array(
            'articleTitle' => $articleTitle,    
            'articleDescription' => $articleDescription,   
            'articleBody' => $articleBody,    
            'id' => $articleId,
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