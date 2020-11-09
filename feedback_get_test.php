<?php

include_once("includes/dbh.inc.php");
include_once("includes/user.inc.php");
include_once("includes/event.inc.php");
include_once("includes/team.inc.php");
include_once("includes/feedback.inc.php");

$feedback = new feedback;
$results = $feedback->get_feedback_user(3);

print "<pre>";
print_r("Participant Name: ".$results[0]['user']->user_first_name." ".$results[0]['user']->user_last_name);
foreach ($results as $result) {

    print_r("<br>");
    print_r("Event ID: ".$result['event']->event_id);

    print_r("<br>");
    print_r("Event Name: ".$result['event']->event_name);

    print_r("<br>");
    print_r("Team Name: ".$result['team']->team_name);

    print_r("<br>");
    print_r("Feedback: ".$result['feedback']);

    // var_dump($result['event']->event_name);
    print_r("<br>");
}

print "</pre>";
//SELECT COUNT(*) AS num FROM feedbacks WHERE team_id=0 AND event_id=1 AND committee_lead_id =2 AND participant_id=3