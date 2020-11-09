<?php

include_once('includes/dbh.inc.php');
include_once('includes/event.inc.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['event_form'])){
        $event = new Event;
        $event->event_name = $_POST['event_name'];
        $event->event_status_code = $_POST['event_status_code'];
        $event->event_type_code = $_POST['event_type_code'];
        $event->event_start_date = $_POST['event_start_date'];
        $event->event_end_date = $_POST['event_end_date'];
        $event->number_of_participants = $_POST['number_of_participants'];
        $event->discount = $_POST['discount'];
        $event->total_cost = $_POST['total_cost'];
        $event->comments = $_POST['comments'];
        $event->other_details = $_POST['other_details'];
        //var_dump($event->get_event_array());
        $event->add_event();
    }



header('Location: '.$_SERVER['REQUEST_URI']);
}

?>

<style>
    /* Style inputs with type="text", select elements and textareas */
    input[type=text],select, textarea {
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
    }

    input[type=number]{
    /* Style inputs with type="text", select elements and textareas */
    width: 100%; /* Full width */
    padding: 12px; /* Some padding */ 
    border: 1px solid #ccc; /* Gray border */
    border-radius: 4px; /* Rounded borders */
    box-sizing: border-box; /* Make sure that padding and width stays in place */
    margin-top: 6px; /* Add a top margin */
    margin-bottom: 16px; /* Bottom margin */
    resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
    }

    input[type=datetime-local]{
        /* Style inputs with type="text", select elements and textareas */
        width: 100%; /* Full width */
        padding: 12px; /* Some padding */ 
        border: 1px solid #ccc; /* Gray border */
        border-radius: 4px; /* Rounded borders */
        box-sizing: border-box; /* Make sure that padding and width stays in place */
        margin-top: 6px; /* Add a top margin */
        margin-bottom: 16px; /* Bottom margin */
        resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
    }
    /* Style the submit button with a specific background color etc */
    input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    /* When moving the mouse over the submit button, add a darker green color */
    input[type=submit]:hover {
    background-color: #45a049;
    }

    /* Add a background color and some padding around the form */
    .container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
    }
</style>

<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
    <input type="hidden" name="event_form" value ="SET">

    <label for="event_name">Event Name</label>
    <input type="text" id="event_name" name="event_name" placeholder="event name...">

    <label for="status-of-event">Status of Event</label>
    <select id="status-of-event" name="event_status_code">
      <option value="1">Completed</option>
      <option value="2">In Progress</option>
      <option value="3">Coming Soon</option>
    </select>

    <label for="type-of-event">Type of Event</label>
    <select id="type-of-event" name="event_type_code">
      <option value="1">Training</option>
      <option value="2">Social Hangouts</option>
      <option value="3">Volunteer</option>
    </select>

    <label for="event-start-date">Start Date (date and time):</label>
    <input type="datetime-local" id="event-start-date" name="event_start_date">

    <label for="event-end-date">End Date (date and time):</label>
    <input type="datetime-local" id="event-end-date" name="event_end_date">

    <label for="number-of-participants">Number of Participants</label>
    <input type="number" id="number-of-participants" name="number_of_participants">

    <label for="discount">Discount</label>
    <input type="number" id="discount" name="discount">

    <label for="total-cost">Price</label>
    <input type="number" id="total-cost" name="total_cost">

    <label for="total-hour-required">Total Hour Required</label>
    <input type="number" id="total-hour-required" name="total_hour_required">

    <label for="comments">Other Details</label>
    <textarea id="comments" name="comments" placeholder="Write something.." style="height:50px"></textarea>

    <label for="other-details">Other Details</label>
    <textarea id="other-details" name="other_details" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">

  </form>
</div>