<?php

class UserManager
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

	public function createUser($user,$email,$password)
	{
		$req = $this->_dbh->prepare("INSERT INTO users(user, email, password, admin) VALUES(:user, :email, :password, :admin)");
		$req->execute(array(
			'user' => $user,
			'email' => $email,
			'password' => $password,
			'admin' => 0
			));
	}

	public function readUser($email)
	{
		$req = $this->_dbh->query("SELECT * FROM users WHERE email = '" . $email . "'" );
		return $req;
	}

	public function rankAdministration($rank)
	{
		$req = $this->_dbh->query("SELECT * FROM rank WHERE rank ='" . $rank . "'");
		return $req;		
	}


}