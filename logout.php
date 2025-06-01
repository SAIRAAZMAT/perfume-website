<?php
session_start();
// Session destroy karen to logout ho jaye user
session_unset();
session_destroy();

// Redirect login page par ya homepage par
header('Location: login.php');
exit;
?>
