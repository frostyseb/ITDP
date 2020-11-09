<?php

include_once('includes/dbh.inc.php');
include_once('includes/event.inc.php');

$variable = new Event;

$variable->get_event_by_eventid(1);
print($variable->event_id."<br>");
print($variable->event_name);