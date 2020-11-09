<?php
include_once("../includes/dbh.inc.php");
include_once("../includes/event.inc.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['join_form'])){
        echo $_SESSION['user_id'];
        echo "<br>";
        echo $_POST['event_id'];
        $event = new Event;
        $event->join_event($_SESSION['user_id'],$_POST['event_id']);
    }



 header('Location: index.php');
}