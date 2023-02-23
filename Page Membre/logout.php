<?php
session_start(); // start the session
session_destroy(); // end the session

// redirect to the login page
header("Location:http://localhost/Page%20Visiteure/Guest.php");
exit(); // ensure that script execution stops here
?>
