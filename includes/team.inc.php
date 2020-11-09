<?php

Class team extends Dbh{
	public $t_r_c;
    public $team_id;
    public $team_name;
    public $member_list = array();

    public function create_team(){
		$insert_query =
		"INSERT INTO". " teams " .
		"SET ".
		"team_name = '"    	    . $this->team_name			    .   "', "
        ;
        
        $result = $this->connect()->query($insert_query);


    }

	public function get_team_role_code($uid){
	$stmt = $this->connect()->prepare("SELECT * FROM has_teams WHERE participant_id = ?");
	$stmt->execute([$uid]);
	if($stmt->rowCount()) {
		while ($row = $stmt->fetch()) {
			$this->t_r_c = $row['team_role_code'];
		}
	}
}

    public function get_team_by_user($uid){
                $stmt = $this->connect()->prepare("SELECT * FROM has_teams WHERE participant_id = ?");
        $stmt->execute([$uid]);
        if($stmt->rowCount()) {
			while ($row = $stmt->fetch()) {
                $this->team_id = $row['team_id'];
			}
        }
    }

    public function get_team_by_team($team_id){
        $stmt = $this->connect()->prepare("SELECT * FROM teams WHERE team_id = ?");
        $stmt->execute([$team_id]);
        if($stmt->rowCount()) {
			while ($row = $stmt->fetch()) {
                $this->team_id = $row['team_id'];
                $this->team_name = $row['team_name'];
			}
        }
        // SELECT * FROM has_teams t1
        // join ref_team_roles t2 ON t2.team_role_code = t1.team_role_code
        // join users t3 ON t3.user_id = t1.participant_id
        $query = 'SELECT * FROM has_teams t1 join ref_team_roles t2 ON t2.team_role_code = t1.team_role_code join users t3 ON t3.user_id = t1.participant_id where team_id = ?';
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$this->team_id]);
        if($stmt->rowCount()) {
			while ($row = $stmt->fetch()) {
                $user = new user;
                $user->user_first_name = $row['user_first_name'];
                $user->user_last_name = $row['user_last_name'];
                $user->user_email = $row['user_email'];
                $user->user_id = $row['user_id'];
                $user->team_role = $row['team_role_description'];
                $this->member_list[] = $user;
			}
        }
    }


    public function join_team($user_id,$team_id,$team_role_code){
        $sql = "SELECT COUNT(*) AS num FROM has_teams WHERE team_id=:team_id AND participant_id=:participant_id";
        $stmt= $this->connect()->prepare($sql);
        $stmt->bindParam(':team_id', $team_id);
        $stmt->bindParam(':participant_id', $user_id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if((int)$row['num'] > 0){
            return false;
        }
        try {
            
            $sql = "INSERT INTO has_teams (team_id, participant_id, team_role_code) VALUES (:team_id, :participant_id, :team_role_code)";
            $stmt= $this->connect()->prepare($sql);
            $stmt->bindParam(':team_id', $team_id);
            $stmt->bindParam(':participant_id', $user_id);
            $stmt->bindParam(':team_role_code', $team_role_code);
            $stmt->execute();
        }catch (Exception $e){
            throw $e;
        }
        return true;
    }

    // public function join_team(){
	// 	$stmt = $this->connect()->prepare("DELETE FROM events WHERE event_id=?");
    //     $stmt->execute([$this->event_id]);
    //     if(!($stmt->rowCount())) echo "Deletion failed";
    // }

    public function set_session(){
        $eventObj= new event;
        $eventObj->event_id= $this->event_id;
        $eventObj->event_status_code= $this->event_status_code;
        $eventObj->event_status_description= $this->event_status_description;
        $eventObj->event_type_code= $this->event_type_code;
        $eventObj->event_type_description= $this->event_type_description;
        $eventObj->event_start_date= $this->event_start_date;
        $eventObj->event_end_date= $this->event_end_date;
        $eventObj->number_of_participants= $this->number_of_participants;
        $eventObj->discount= $this->discount;
        $eventObj->total_cost= $this->total_cost;
        $eventObj->comments= $this->comments;
        $eventObj->other_details= $this->other_details;
        $eventObj->event_name= $this->event_name;
        $eventObj->total_hour_required= $this->total_hour_required;
        $reg_serlizer = base64_encode(serialize($eventObj));
        $_SESSION['eventObj'] = $reg_serlizer;
    }

    public function decode_session($event_name){
        return unserialize((base64_decode($_SESSION['event_name'])));
    }

    public function get_event(){

    }

    public function get_all_event($uid){
        // $query = "SELECT * FROM events t1 join ref_event_types t2 ON t2.event_type_code = t1.event_type_code join ref_event_status t3 ON t3.event_status_code = t1.event_status_code"

        // SELECT * FROM events t1
        // join ref_event_types t2 ON t2.event_type_code = t1.event_type_code
        // join ref_event_status t3 ON t3.event_status_code = t1.event_status_code
        // join attendances t4 ON t4.event_id = t1.event_id
        // join users t5 ON t5.user_id = t4.user_id WHERE t4.user_id = 1

        $joined_query = "SELECT * FROM events t1 join ref_event_types t2 ON t2.event_type_code = t1.event_type_code join ref_event_status t3 ON t3.event_status_code = t1.event_status_code join attendances t4 ON t4.event_id = t1.event_id join users t5 ON t5.user_id = t4.user_id WHERE t4.user_id = ?";
        
        // $unjoin_query = "SELECT * FROM events WHERE event_id not in (SELECT event_id FROM attendances WHERE user_id = ?)";
        //SELECT * FROM events t1 join ref_event_types t2 ON t2.event_type_code = t1.event_type_code join ref_event_status t3 ON t3.event_status_code = t1.event_status_code WHERE t1.event_id not in (SELECT event_id FROM attendances WHERE user_id = 1)
       
        // SELECT * FROM events t1
        // join ref_event_types t2 ON t2.event_type_code = t1.event_type_code
        // join ref_event_status t3 ON t3.event_status_code = t1.event_status_code
        // WHERE t1.event_id not in (SELECT event_id FROM attendances WHERE user_id = 1)
        $unjoin_query_full = 'SELECT * FROM events t1 join ref_event_types t2 ON t2.event_type_code = t1.event_type_code join ref_event_status t3 ON t3.event_status_code = t1.event_status_code WHERE t1.event_id not in (SELECT event_id FROM attendances WHERE user_id = ?)';
        $stmt = $this->connect()->prepare($joined_query);
		$stmt->execute([$uid]);
		if($stmt->rowCount()) {
			while ($row = $stmt->fetch()) {
                $eventObj= new event;
                $eventObj->event_id= $row['event_id'];
                $eventObj->event_status_code= $row['event_status_code'];
                $eventObj->event_status_description= $row['event_status_description'];
                $eventObj->event_type_code= $row['event_type_code'];
                $eventObj->event_type_description= $row['event_type_description'];
                $eventObj->event_start_date= $row['event_start_date'];
                $eventObj->event_end_date= $row['event_end_date'];
                $eventObj->number_of_participants= $row['number_of_participants'];
                $eventObj->discount= $row['discount'];
                $eventObj->total_cost= $row['total_cost'];
                $eventObj->comments= $row['comments'];
                $eventObj->other_details= $row['other_details'];
                $eventObj->event_name= $row['event_name'];
                $eventObj->total_hour_required= $row['total_hour_required'];
				$this->joined_array[] = $eventObj;
			}
        }

        $stmt = $this->connect()->prepare($unjoin_query_full);
        $stmt->execute([$uid]);
		if($stmt->rowCount()) {
			while ($row = $stmt->fetch()) {
                $eventObj= new event();
                $eventObj->event_id= $row['event_id'];
                $eventObj->event_status_code= $row['event_status_code'];
                $eventObj->event_status_description= $row['event_status_description'];
                $eventObj->event_type_code= $row['event_type_code'];
                $eventObj->event_type_description= $row['event_type_description'];
                $eventObj->event_start_date= $row['event_start_date'];
                $eventObj->event_end_date= $row['event_end_date'];
                $eventObj->number_of_participants= $row['number_of_participants'];
                $eventObj->discount= $row['discount'];
                $eventObj->total_cost= $row['total_cost'];
                $eventObj->comments= $row['comments'];
                $eventObj->other_details= $row['other_details'];
                $eventObj->event_name= $row['event_name'];
                $eventObj->total_hour_required= $row['total_hour_required'];
				$this->unjoin_array[] = $eventObj;
			}
        }        
    }



}