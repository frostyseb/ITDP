<?php

session_start();

include_once('dbh.inc.php');

class attendance extends Dbh {
	
	public $training_hours;
	
	
	public function get_training_hours($uid) {
		$stmt = $this->connect()->prepare("SELECT attendances.hour_attended FROM attendances INNER JOIN events ON attendances.event_id = events.event_id WHERE attendances.user_id = ? AND events.event_type_code = 1");
		$stmt->execute([$uid]);
		if($stmt->rowCount()) {
			while($row = $stmt->fetch()) {
				$this->training_hours = $row['hour_attended'];
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