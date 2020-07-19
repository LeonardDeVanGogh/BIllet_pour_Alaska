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
		$req = $this->_dbh->prepare("SELECT * FROM users WHERE email = :email");
        $req->execute(array(
            'email' => $email,
            ));
		return $req;
	}

	public function emailOccurrence($email)
	{
		$req = $this->_dbh->prepare("SELECT COUNT(email) AS 'count' FROM users WHERE email = :email");
        $req->execute(array(
            'email' => $email,
            ));
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
	public function updateName($id,$userName){
		$req = $this->_dbh->prepare("UPDATE users SET user = :user WHERE id = :id");
		$req->execute(array(
			'id'=>$id,
			'user'=>$userName
			));
	}
	public function updatePassword($id,$password){
		$req = $this->_dbh->prepare("UPDATE users SET password = :password WHERE id = :id");
		$req->execute(array(
			'id'=>$id,
			'password'=>$password
			));
	}
	public function updateEmail($id,$userEmail){
		$req = $this->_dbh->prepare("UPDATE users SET email = :email WHERE id = :id");
		$req->execute(array(
			'id'=>$id,
			'email'=>$userEmail
			));
	}
	public function deleteUser($id){
		$req = $this->_dbh->prepare("DELETE FROM users WHERE id = :id");
		$req->execute(array(
			'id'=>$id,

			));
	}


}