<?php
//start a session
session_start();
//desroy the session to logout
session_destroy();
//finally redirect the user to the start page

header("location: login.php");
?>