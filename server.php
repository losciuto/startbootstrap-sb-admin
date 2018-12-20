<?php
if (version_compare(phpversion(), '5.4.0', '<')) {
    if (session_id() == '') {
        session_start();
    }
} else {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

// initializing variables
$username = "";
$email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '1m42s11m0', 'pixpresenze');
?>