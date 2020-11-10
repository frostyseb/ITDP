<?php

include_once('includes/fetchAttendance.php'); 
include_once("includes/dbh.inc.php");
include_once("includes/event.inc.php");
include_once('team_test2.php'); 
include_once('includes/team.inc.php');

$team = new team;
$team->get_team_role_code(3);
echo $team->t_r_c;