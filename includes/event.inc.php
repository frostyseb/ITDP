<?php

Class event extends dbh{
    public $event_id
    public $event_status_code
    public $events_status_name
    public $event_type_code
    public $event_type_description
    public $event_start_date
    public $event_end_date
    public $number_of_participants
    public $discount
    public $total_cost
    public $comments
    public $other_details
    public $event_name
    public $total_hour_required

    public function add_events(){

    }

    public function edit_events(){
        $stmt = $this->connect()->prepare(
            "UPDATE events SET event_status_code=?, event_type_code=?, event_start_date=? event_end_date=?, number_of_participants=?, discount=?, total_cost=?, comments=? other_details=?, event_name=?, total_hour_required=?  WHERE event_id=?"
        );
		$stmt->execute([$this->event_status_code,$this->event_type_code,$this->event_start_date,$this->event_end_date, $this->number_of_participants, $this->discount,$this->comments, $this->total_cost,$this->other_details,$this->event_name,$this->total_hour_required, $this->event_id]);
    }

    public function delete_events(){
		$stmt = $this->connect()->prepare("DELETE FROM events WHERE event_id=?");
        $stmt->execute([$this->event_id]);
        if(!($stmt->rowCount())) echo "Deletion failed";
    }

    public function set_session(){
        $eventObj= new event();
        $eventObj->event_id= $this->event_id;
        $eventObj->event_status_code= $this->event_status_code;
        $eventObj->events_status_name= $this->events_status_name;
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

    public function get_all_event(){
        // $query = "SELECT * FROM events t1 join ref_event_types t2 ON t2.event_type_code = t1.event_type_code join ref_event_status t3 ON t3.event_status_code = t1.event_status_code"
        $joined_query = "SELECT * FROM events t1". 
        "join ref_event_types t2 ON t2.event_type_code = t1.event_type_code".
        "join ref_event_status t3 ON t3.event_status_code = t1.event_status_code".
        "join attendances t4 ON t4.event_id = t1.event_id".
        "join users t5 ON t5.user_id = t4.user_id";


        
    }


}