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
		$req = $this->_dbh->prepare("INSERT INTO users(user, email, password) VALUES(:user, :email, :password)");
		$req->execute(array(
			'user' => $user,
			'email' => $email,
			'password' => $password
			));
	}

	public function readUser($email)
	{
		$req = $this->_dbh->query("SELECT * FROM users WHERE email = '" . $email . "'" );
		return $req;
	}
	
	public function readAllUsers(){
		$req = $this->_dbh->query("SELECT id, user, email, rank FROM users");
		return $req;
	}

	public function updateUserRank($id,$rank){
		$req = $this->_dbh->prepare("UPDATE users SET rank = :rank WHERE id = :id");
		$req->execute(array(
			'id'=>$id,
			'rank'=>$rank
			));
	}
	public function deleteUser($id){
		$req = $this->_dbh->prepare("DELETE FROM users WHERE id = :id");
		$req->execute(array(
			'id'=>$id,

			));
	}


}