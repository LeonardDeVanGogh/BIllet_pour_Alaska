<?php

class User
{
    protected $_user;
    protected $_email;
    protected $_password;
    protected $_rank;

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

    public function user()
    {
    	return $this->_user;
    }
	public function email()
    {
    	return $this->_email;
    }
    public function password()
    {
    	return $this->_password;
    }
    public function rank()
    {
        return $this->_rank;
    }

    public function setUser($user)
    {
    	$this->_user = $user;
    }
    public function setEmail($email)
    {
    	$this->_email = $email;
    }
    public function setPassword($password)
    {
    	$this->_password = $password;
    }
    public function setRank($rank)
    {
        $this->_rank = $rank;
    }


}