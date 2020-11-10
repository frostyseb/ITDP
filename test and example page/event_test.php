<?php

include_once("includes/dbh.inc.php");
include_once("includes/event.inc.php");

$event = new event;

$event->get_all_event(1);

print "<pre>";
// print_r($event->unjoin_array);

print_r("<h1>Unjoin Event</h1>");
foreach ($event->unjoin_array as $e) {
    // print_r($e->event_id);
    var_dump($e);
    print_r("<br>");
}

print_r("<hr>");
print_r("<h1>Joined Event</h1>");
foreach ($event->joined_array as $e) {
    // print_r($e->event_id);
    var_dump($e);
    print_r("<br>");
}


print "</pre>";
