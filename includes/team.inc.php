<?php

Class team extends Dbh{
    public $team_id;
    public $team_name;
    public $committe_lead_id;
    public $committe_lead_name;
    public $member_ids = array();
    public $member_names = array();


    public function create_team(){
		$insert_query =
		"INSERT INTO". " teams " .
		"SET ".
		"team_name = '"    	    . $this->team_name			    .   "', "
        ;
        
        $result = $this->connect()->query($insert_query);


    }

    public function get_team_by_id($uid){
        $stmt = $this->connect()->prepare("SELECT * FROM teams WHERE team_id = ?");
        $stmt->execute([$uid]);
        if($stmt->rowCount()) {
			while ($row = $stmt->fetch()) {
                $this->team_id = $row['team_id'];
                $this->team_name = $row['team_name'];
			}
        }
    }


    public function join_team(){
        $insert_query =
		"INSERT INTO". " teams " .
		"SET ".
		"team_id = '"    	    . $this->team_id			    .   "', "
        ;
        
        $result = $this->connect()->query($insert_query);
    }

    public function join_team(){
		$stmt = $this->connect()->prepare("DELETE FROM events WHERE event_id=?");
        $stmt->execute([$this->event_id]);
        if(!($stmt->rowCount())) echo "Deletion failed";
    }

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