<?php
session_start();
$_SESSION = array(); // Clear session variables
session_destroy(); // End the session
header("Location: /Capstone/index.php"); // Redirect to login page
exit();
?>
