<?php

include_once "includes/dbh.inc.php";
include_once "includes/user.inc.php";
include_once "includes/team.inc.php";

$team = new team;

$team->get_team_by_team(1);

foreach ($team->member_list as $member) {
    $member->user_id;
    $member->user_first_name;
	$member->user_last_name;
	$member->user_email;
    $member->team_role;
}


/*print "<pre>";
// print_r($event->unjoin_array);

print_r("<h1>Team</h1>");
foreach ($team->member_list as $member) {
    print_r("User ID: ". $member->user_id);
    print_r("<br>");
    print_r("Name: ".$member->user_first_name. " ". $member->user_last_name);
    print_r("<br>");
    print_r("Email: ".$member->user_email);
    print_r("<br>");
    print_r("Team Role: ".$member->team_role);
    // var_dump($member);
    print_r("<br>");
    print_r("<br>");
}

print_r("<hr>");

print "</pre>"; */
