<?php

include_once "includes/dbh.inc.php";
include_once "includes/user.inc.php";
include_once "includes/team.inc.php";

$team = new team;

if($team->join_team(6,2,2)){
    echo "Done!";
}
else{
    echo "Failed!";
}