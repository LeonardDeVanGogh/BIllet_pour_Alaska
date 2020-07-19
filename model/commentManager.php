<?php
  defined("_Can_access_") or die("Inclusion directe non autorisée");
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
        $req = $this->_dbh->prepare("SELECT id, id_article, comment, report, moderated, validated, hidden FROM comment WHERE id_article = :id_article AND hidden <> '1'  ORDER BY id DESC");
        $req->execute(array(
            'id_article' => $idArticle,
            ));
        return $req;
    }
    public function readOneComment($idComment)
    {
        $req = $this->_dbh->prepare("SELECT id, id_article, comment, report FROM comment WHERE id = :id");
        $req->execute(array(
            'id' => $idComment,
            ));
        return $req;
    }
    public function readForModeration()
    {
        $req = $this->_dbh->prepare("SELECT r.id, r.id_comment, r.report_reason, c.id, c.id_article, c.comment, c.moderated, c.report, c.hidden FROM reports r INNER JOIN comment c ON r.id_comment = c.id WHERE c.moderated = :moderated ORDER BY date_comment");
        $req->execute(array(
            'moderated' => 0,
            ));
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
    public function hideComment($idComment)
    {
        $req= $this->_dbh->prepare("UPDATE comment SET moderated = :moderated, hidden = :hidden WHERE id= :id");
            $req->execute(array(
            'hidden' => 1,
            'moderated' => 1,    
            'id' => $idComment,
        ));
    }
    public function validateComment($idComment)
    {
        $req = $this->_dbh->prepare("UPDATE comment SET moderated = :moderated, validated = :validated WHERE id= :id");
            $req->execute(array(
            'moderated' => 1,
            'validated' => 1,
            'id' => $idComment,
        ));
    }

}