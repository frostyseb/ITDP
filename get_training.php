<?php

include_once('includes/dbh.inc.php');
include_once('includes/event.inc.php');

$event = new event;

$events = $event->get_training();

print "<pre>";
// print_r($event->unjoin_array);

print_r("<h1>Training Event</h1>");
foreach ($events as $event) {
    print_r("Event ID: ". $event->event_id);
    print_r("<br>");
    print_r("Event Name: ". $event->event_name);
    print_r("<br>");
    print_r("Number of participants: ". $event->number_of_participants);
    print_r("<br>");
    print_r("Price: ". $event->total_cost);
    print_r("<br>");
    print_r("total_hour_required: ". $event->total_hour_required);
    print_r("<br>");
    print_r("<hr>");
}


print "</pre>";
