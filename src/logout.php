<?php
unset($_SESSION['user_name']);
unset($_SESSION['user_id']);
session_unset();
session_destroy();
header("Location: login.php");
exit();