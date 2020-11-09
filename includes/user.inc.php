<?php

class User extends dbh {
	public $tablename = " users ";
	public $userDataArray = array();
	
	public $user_id;
	public $user_name;
	public $user_first_name;
	public $user_last_name;
	public $user_password;
	public $user_email;
	public $user_gender;
	public $user_role_code;
	public $team_role_description;
	
	public $insertUser;
	public $updateUser;
	
	public function checkUser($udArray = array()){
		if(!empty($udArray)){

			$this->setUserDataArray($udArray);

			$stmt = $this->connect()->query($this->user_id);
			if($stmt->rowCount()){
				//_dump($this->userDataArray);
				$update = $this->connect()->query($this->updateUser);
				//echo "There is data";
			}
			else{
				$insert = $this->connect()->query($this->insertUser);
				$stmt = $this->connect()->prepare("UPDATE TABLE users SET gender=? WHERE user_id=?");
				$stmt->execute([" "]);
				//echo "No data in database";
			}

			$userData = $stmt->fetch();

		}
		 $this->fetchUser();
		//return $userData;
    }
	
	private function setUserDataArray($array = array()) {
		$this->userDataArray = $array;
		$this->separateFromArray();
	}
	
	private function separateFromArray(){
		$this->user_id = $this->userDataArray['user_id'];
		$this->user_name = $this->userDataArray['user_name'];
		$this->user_first_name = $this->userDataArray['user_first_name'];
		$this->user_last_name = $this->userDataArray['user_last_name'];
		$this->user_password = $this->userDataArray['user_password'];
		$this->user_email = $this->userDataArray['user_email'];
		$this->user_gender = $this->userDataArray['user_gender'];
		$this->user_role_code = $this->userDataArray['user_role_code'];
		 
		$this->user_id = 
		"SELECT * FROM" .$this->tableName. 
		"WHERE user_id = '" . $this->user_id . "'";

		$this->insertUser =
		"INSERT INTO". $this->tableName .
		"SET ".
		"user_id = '"      		. $this->user_id  			.   "', " .
		"user_name = '"    		. $this->user_name			.   "', " .
		"user_first_name = '"   . $this->user_first_name    .   "', " .
		"user_last_name = '"    . $this->user_last_name    	.   "', " .
		"user_password = '"     . $this->user_password    	.   "', " .
		"user_email = '"        . $this->user_email    		.   "', " .
		"user_gender = '"       . $this->user_gender    	.   "', " .
		"user_role_code = '"       . $this->user_role_code
		;

		$this->updateUser = 
		"UPDATE". $this->tableName .
		"SET ".
		"user_name = '"   		. $this->user_name    		.   "', " .
		"user_first_name = '"   . $this->user_first_name    .   "', " .
		"user_last_name = '"    . $this->user_last_name    	.   "', " .
		"user_email = '"        . $this->user_email    		.   "', " .
		"user_password = '"     . $this->password    		.   "', " .
		"user_gender = '"       . $this->user_gender    	.   "', " .
		"user_role_code = '"    . $this->user_role_code    	.   "', " .
		"WHERE ".
		"user_id ='"       .   $this->user_id    .   "'"
		;

	}
	
	public function updateGender($gender){
		$stmt = $this->connect()->prepare("UPDATE users SET gender=? WHERE user_id=?");
		$stmt->execute([$user_gender,$this->user_id]);
    }
	
	public function fetchUser() {
		$stmt = $this->connect()->prepare("SELECT * FROM USERS WHERE user_id=?");
		$stmt->execute([$this->user_id]);
		
		if($stmt->rowCount()) {
			while ($row = $stmt->fetch()) {
				$this->user_id = $row['user_id'];
				$this->user_name = $row['user_name'];
				$this->user_first_name = $row['user_first_name'];
				$this->user_last_name = $row['user_last_name'];
				$this->user_password = $row['user_password'];
				$this->user_email = $row['user_email'];
				$this->user_gender = $row['user_gender'];
				$this->user_role_code = $row['user_role_code'];
			}
		}
		$this->setSession();
	}
	
	private function setSession() {
		$_SESSION['user_id'] = $this->user_id;
		$_SESSION['user_name'] = $this->user_name;
		$_SESSION['user_first_name'] = $this->user_first_name;
		$_SESSION['user_last_name'] = $this->user_last_name;
		$_SESSION['user_email'] = $this->user_email;
		switch($this->user_gender) {
			case 'F':
				$_SESSION['user_gender'] = 'Female';
				break;
			case 'M':
				$_SESSION['user_gender'] = 'Male';
				break;
		}
		switch($this->user_role_code) {
			case 1:
				$_SESSION['user_role_code'] = 'Participant';
				break;
			case 2:
				$_SESSION['user_role_code'] = 'Program Manager';
				break;
		}
	}
}


// select * FROM users a INNER JOIN ref_user_roles b on a.user_role_code = b.user_role

?>