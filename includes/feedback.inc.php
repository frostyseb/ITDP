<?php

Class feedback extends Dbh{
    public $team;
    public $user;
    public $event;
    public $feedback;

	public function add_feedback($team_id,$event_id,$committee_lead_id,$participant_id,$feedback){
		$sql = "SELECT COUNT(*) AS num FROM feedbacks WHERE team_id=:team_id AND event_id=:event_id AND committee_lead_id =:committee_lead_id AND participant_id=:participant_id";
        $stmt= $this->connect()->prepare($sql);
        $stmt->bindParam(':team_id', $team_id);
		$stmt->bindParam(':event_id', $event_id);
		$stmt->bindParam(':committee_lead_id', $committee_lead_id);
		$stmt->bindParam(':participant_id', $participant_id);
        $stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		// echo $row['num'];
        if((int)$row['num'] > 0){
            return false;
        }
        try {
            
            $sql = "INSERT INTO feedbacks (team_id, event_id, committee_lead_id, participant_id, feedback) VALUES (:team_id, :event_id, :committee_lead_id, :participant_id, :feedback)";
            $stmt= $this->connect()->prepare($sql);
            $stmt= $this->connect()->prepare($sql);
            $stmt->bindParam(':team_id', $team_id);
            $stmt->bindParam(':event_id', $event_id);
            $stmt->bindParam(':committee_lead_id', $committee_lead_id);
            $stmt->bindParam(':participant_id', $participant_id);
            $stmt->bindParam(':feedback', $feedback);
            $stmt->execute();
        }catch (Exception $e){
            throw $e;
        }
        return true;
    }

    public function get_feedback_user($user_id) {
		$stmt = $this->connect()->prepare("SELECT * FROM feedbacks t1
        JOIN users t2 ON t2.user_id = t1.participant_id
        JOIN events t4 ON t4.event_id = t1.event_id
        join ref_event_types t5 ON t5.event_type_code = t4.event_type_code
        join ref_event_status t6 ON t6.event_status_code = t4.event_status_code
        join teams t7 ON t7.team_id = t1.team_id
        WHERE participant_id=:participant_id
        ");
        $stmt->bindParam(':participant_id', $user_id);
        $stmt->execute();
        $feedback_list;
		if($stmt->rowCount()) {
			while($row = $stmt->fetch()){
                $event = new event;
                $team = new team;
                $user = new user;

                $event->event_id= $row['event_id'];
                $event->event_status_code= $row['event_status_code'];
                $event->event_status_description= $row['event_status_description'];
                $event->event_type_code= $row['event_type_code'];
                $event->event_type_description= $row['event_type_description'];
                $event->event_start_date= $row['event_start_date'];
                $event->event_end_date= $row['event_end_date'];
                $event->number_of_participants= $row['number_of_participants'];
                $event->discount= $row['discount'];
                $event->total_cost= $row['total_cost'];
                $event->comments= $row['comments'];
                $event->other_details= $row['other_details'];
                $event->event_name= $row['event_name'];
                $event->total_hour_required= $row['total_hour_required'];
                
                $team->team_id = $row['team_id'];
                $team->team_name = $row['team_name'];
                
                $user->user_id = $row['user_id'];
				$user->user_name = $row['user_name'];
				$user->user_first_name = $row['user_first_name'];
				$user->user_last_name = $row['user_last_name'];
				$user->user_password = $row['user_password'];
				$user->user_email = $row['user_email'];
				$user->user_gender = $row['user_gender'];
				$user->user_role_code = $row['user_role_code'];
                

                $feedback_list[] = array(
                    'event' => $event,
                    'team' => $team,
                    'user' => $user,
                    'feedback' => $row['feedback']
                );
            }
            return $feedback_list;
		}
		
	}
    
    
    // SELECT * FROM feedbacks t1
    // JOIN users t2 ON t2.user_id = t1.participant_id
    // JOIN users t3 ON t3.user_id = t1.committee_lead_id
    // JOIN events t4 ON t4.event_id = t1.event_id
    // join ref_event_types t5 ON t5.event_type_code = t4.event_type_code
    // join ref_event_status t6 ON t6.event_status_code = t4.event_status_code
    // join teams t7 ON t7.team_id = t1.team_id
    // WHERE committee_lead_id=2

    public function get_feedback_committee_lead($committee_lead_id) {
		$stmt = $this->connect()->prepare("SELECT * FROM feedbacks t1
        JOIN users t2 ON t2.user_id = t1.participant_id
        JOIN users t3 ON t3.user_id = t1.committee_lead_id
        JOIN events t4 ON t4.event_id = t1.event_id
        join ref_event_types t5 ON t5.event_type_code = t4.event_type_code
        join ref_event_status t6 ON t6.event_status_code = t4.event_status_code
        join teams t7 ON t7.team_id = t1.team_id
        WHERE committee_lead_id=:committee_lead_id
        ");
        $stmt->bindParam(':committee_lead_id', $committee_lead_id);
        $stmt->execute();
        $feedback_list;
		if($stmt->rowCount()) {
			while($row = $stmt->fetch()){
                $event = new event;
                $team = new team;
                $committee = new user;

                $event->event_id= $row['event_id'];
                $event->event_status_code= $row['event_status_code'];
                $event->event_status_description= $row['event_status_description'];
                $event->event_type_code= $row['event_type_code'];
                $event->event_type_description= $row['event_type_description'];
                $event->event_start_date= $row['event_start_date'];
                $event->event_end_date= $row['event_end_date'];
                $event->number_of_participants= $row['number_of_participants'];
                $event->discount= $row['discount'];
                $event->total_cost= $row['total_cost'];
                $event->comments= $row['comments'];
                $event->other_details= $row['other_details'];
                $event->event_name= $row['event_name'];
                $event->total_hour_required= $row['total_hour_required'];
                
                $team->team_id = $row['team_id'];
                $team->team_name = $row['team_name'];

                $query = "SELECT * FROM feedbacks t1
                JOIN users t2 ON t2.user_id = t1.participant_id
                WHERE committee_lead_id=:committee_lead_id";
                $stmt = $this->connect()->prepare($query);
                $stmt->bindParam(':committee_lead_id', $committee_lead_id);
                $stmt->execute();

                

                $feedback_list[] = array(
                    'event' => $event,
                    'team' => $team,
                    'committee' => $user,
                    'feedback' => $row['feedback']
                );
            }
            return $feedback_list;
		}
		
	}
}