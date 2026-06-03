<?php
session_start();

// Unset all session array variables
$_SESSION = array();

// If tracking session cookies are present, destroy them completely
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the runtime backend session trace
session_destroy();

// Route back to base login interface
header("Location:login.php");
exit;