<?php

class CommentManager
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

    public function readComment($idArticle)
    {
        $req =  $this->_dbh->query("SELECT id, id_article, comment, report, hidden FROM comment WHERE id_article=" . $idArticle . " AND hidden <> '1'  ORDER BY id DESC");
        return $req;
    }
    public function readOneComment($idComment)
    {
        $req =  $this->_dbh->query("SELECT id, id_article, comment, report FROM comment WHERE id=" . $idComment);
        return $req;
    }
    public function updateCommentReport($nbReport,$idComment,$report_reason)
    {
        $req= $this->_dbh->prepare("UPDATE comment SET report = $nbReport WHERE id= :id");
            $req->execute(array(
            'id' => $idComment,
        ));
        $req = $this->_dbh->prepare('INSERT INTO reports(id_comment, report_reason) VALUES(:id_comment, :report_reason)');
        $req->execute(array(
            'id_comment' => $idComment,
            'report_reason' => $report_reason,
        ));
    }
    public function createComment($id_article,$comment)
    {
        $req = $this->_dbh->prepare('INSERT INTO comment(id_article, comment) VALUES(:id_article, :comment)');
        $req->execute(array(
            'id_article'=> $id_article,
            'comment' => $comment,
        ));
    }
    public function deleteComment($id_comment)
    {
        $req= $this->_dbh->prepare("DELETE FROM comment WHERE id= :id");
            $req->execute(array(
            'id' => $id_comment,
        ));
    }
    public function hideComment($idComment,$hidden)
    {
        $req= $this->_dbh->prepare("UPDATE comment SET hidden = $hidden WHERE id= :id");
            $req->execute(array(
            'id' => $idComment,
        ));
    }

}