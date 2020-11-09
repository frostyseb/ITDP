<?php

session_start();

include_once('dbh.inc.php');
include_once('user.inc.php');
include_once('event.inc.php');
include_once('team.inc.php');

class attendance extends Dbh {
	
	public $training_hours;
	public $event_name;
	public $team;
	public $event;
	public $user;
	
	
	public function get_training_hours($uid) {
		$stmt = $this->connect()->prepare("SELECT attendances.hour_attended FROM attendances INNER JOIN events ON attendances.event_id = events.event_id WHERE attendances.user_id = ? AND events.event_type_code = 1");
		$stmt->execute([$uid]);
		if($stmt->rowCount()) {
			while($row = $stmt->fetch()) {
				$this->training_hours = $row['hour_attended'];
			}
		}
	}
	
	public function get_feedback() {
		$stmt = $this->connect()->prepare("SELECT * FROM feedbacks t1
        JOIN users t2 ON t2.user_id = t1.participant_id
        JOIN users t3 ON t3.user_id = t1.committee_lead_id
        JOIN events t4 ON t4.event_id = t1.event_id");
		$stmt->execute();
		if($stmt->rowCount()) {
			while($row = $stmt->fetch()) {
				$this->event_name  = $row['event_name'];
			}
		}
		
	}
}

/*$servername = "localhost";
$username = "root";
$password = "";
$dbname = "itdp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT attendances.hour_attended FROM attendances INNER JOIN events ON attendances.event_id = events.event_id WHERE attendances.user_id = " . $_SESSION['user_id'] . " AND events.event_type_code = 1";
$result = $conn->query($sql);

$htmlContents = file_get_contents("index.html");

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $result = $row['hour_attended'];
  }
} else {
  echo "0 results";
}
$conn->close();
*/
?>