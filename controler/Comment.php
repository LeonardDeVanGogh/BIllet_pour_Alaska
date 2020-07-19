<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
class Comment
{
    protected $_id;
    protected $_id_article;
    protected $_comment;
    protected $_date_comment;
    protected $_moderated;
    protected $_report;

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

    public function id()
    {
        return $this->_id;
    }

    public function id_article()
    {
        return $this->_id_article;
    }

    public function comment()
    {
        return $this->_comment;
    }
    public function date_comment()
    {
        return $this->_date_comment;
    }
    public function moderated()
    {
        return $this->_moderated;
    }
    public function report()
    {
        return $this->_report;
    }

    public function setId($id)
    {
        $id = (int) $id;
        if($id>0){
            $this->_id = $id;
        }
    }
    public function setComment($comment){
        $this->_comment = $comment;
    }
    public function setId_article($id_article){
        $this->_id_article = $id_article;
    }
    public function setModerated($moderated){
        $this->_moderated = $moderated;
    }
    public function setReport($report){
        $this->_report =  $report;
    }


}