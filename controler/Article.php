<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");

class Article
{
    protected $_id;
    protected $_title;
    protected $_description;
    protected $_article;
    protected $_date_article;
    protected $_user;
    protected $_picture_name;

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

    public function title()
    {
        return $this->_title;
    }
    public function description()
    {
        return $this->_description;
    }
    public function article()
    {
        return $this->_article;
    }
    public function date_article()
    {
        return $this->_date_article;
    }
    public function user()
    {
        return $this->_user;
    }
    public function pictureName()
    {
        return $this->_picture_name;
    }


    public function setId($id){
        $id = (int) $id;
        if($id>0){
            $this->_id = $id;
        }
    }
    public function setTitle($title){
        $this->_title = $title;
    }
    public function setDescription($description){
        $this->_description = $description;
    }
    public function setArticle($article){
        $this->_article = $article;
    }
    public function setDate_article($date_article)
    {
        $this->_date_article = $date_article;
    }
    public function setUser($user)
    {
        $this->_user = $user;
    }
    public function setPicture_name($pictureName)
    {
        $this->_picture_name = $pictureName;
    }


    public function savePicture(){
        $fileInfo = pathinfo($_FILES['articlePicture']['name']);
        $extension_upload = $fileInfo['extension'];
        $validatedExtensions = array('jpg', 'jpeg', 'gif', 'png');
        if (in_array($extension_upload, $validatedExtensions))
        {
            $pictureName = 'article' . $this->id() . "." . $fileInfo['extension'];
            $this->setPicture_name($pictureName);
            move_uploaded_file($_FILES['articlePicture']['tmp_name'],'img/' . $this->pictureName());
        }
    }

}


