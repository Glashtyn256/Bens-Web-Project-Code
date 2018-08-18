
<?php
session_start();

// Unset all of the session variables.
$_SESSION = array();
session_destroy();
//$_SERVER['HTTP_REFERER'];
header('Location: Home.php')//.$_SERVER['HTTP_REFERER']);
?>