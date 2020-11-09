<?php

class User extends dbh {
	private $tablename = " users ";
	private $userDataArray = array();
	
	private $user_id;
	private $user_name;
	private $user_first_name;
	private $user_last_name;
	private $user_password;
	private $user_email;
	private $user_gender;
	private $user_role_code;
	
	public function fetchUser() {
		$stmt = $this->connect()->prepare("SELECT * FROM USERS WHERE user_id=?");
		$stmt->execute([$this->user_id]);
		
		if($stmt->rowCount()) {
			while ($row = $stmt->fetch())
		}
	}
	
	private function setSession() {
		$_SESSION['
	}
}

?>