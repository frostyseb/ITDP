<?php

include_once("includes/dbh.inc.php");
include_once("includes/user.inc.php");
include_once("includes/event.inc.php");
include_once("includes/team.inc.php");
include_once("includes/feedback.inc.php");

$feedback = new feedback;

if($feedback->add_feedback(0,1,2,1,"abc")){
    echo "Success!";
}
else{{
    echo "Failed!";
}}

//SELECT COUNT(*) AS num FROM feedbacks WHERE team_id=0 AND event_id=1 AND committee_lead_id =2 AND participant_id=3