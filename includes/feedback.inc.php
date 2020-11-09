<?php

Class event extends Dbh{
    public $team;
    public $user;
    public $event;
    public $feedback;

	public function add_feedback($team_id,$event_id,$committe_lead_id,$participant_id,$feedback){
		$this->$team = new team;
		$this->$user = new user;
		$this->$event = new event;

		$sql = "SELECT COUNT(*) AS num FROM feedbacks WHERE team_id=:team_id AND event_id=:event_id AND committe_lead_id=:committe_lead_id AND participant_id:participant_id";
        $stmt= $this->connect()->prepare($sql);
        $stmt->bindParam(':team_id', $team_id);
		$stmt->bindParam(':event_id', $event_id);
		$stmt->bindParam(':committe_lead_id', $committe_lead_id);
		$stmt->bindParam(':participant_id', $participant_id);
        $stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $row['num'];
    //     if((int)$row['num'] > 0){
    //         return false;
    //     }
    //     try {
            
    //         $sql = "INSERT INTO has_teams (team_id, participant_id, team_role_code) VALUES (:team_id, :participant_id, :team_role_code)";
    //         $stmt= $this->connect()->prepare($sql);
    //         $stmt->bindParam(':team_id', $team_id);
    //         $stmt->bindParam(':participant_id', $user_id);
    //         $stmt->bindParam(':team_role_code', $team_role_code);
    //         $stmt->execute();
    //     }catch (Exception $e){
    //         throw $e;
    //     }
    //     return true;
	}



}