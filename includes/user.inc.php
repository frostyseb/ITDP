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
	
	private $insertUser;
	private $updateUser;
	
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
		"created = '"      . date("Y-m-d H:i:s") . "', ".
		"modified = '"     . date("Y-m-d H:i:s") . "' "
		;

		$this->updateUser = 
		"UPDATE". $this->tableName .
		"SET ".
		"user_name = '"   		. $this->user_name    		.   "', " .
		"user_first_name = '"   . $this->user_first_name    .   "', " .
		"user_last_name = '"    . $this->user_last_name    	.   "', " .
		"user_email = '"        . $this->user_email    		.   "', " .
		"user_password = '"     . $this->password    		.   "', " .
		"user_gender = '"        . $this->user_gender    	.   "', " .
		"modified = '"     . date("Y-m-d H:i:s") . "' ".
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
			case 'M':
				$_SESSION['user_gender'] = 'Female';
				break;
			case 'F':
				$_SESSION['user_gender'] = 'Male';
				break;
		}
		switch($this->user_role_code) {
			case 0:
				$_SESSION['user_role_code'] = 'Participant';
				break;
			case 1:
				$_SESSION['user_role_code'] = 'Committee Lead';
				break;
			case 2:
				$_SESSION['user_role_code'] = 'Program Manager';
				break;
		}
	}
}

?>