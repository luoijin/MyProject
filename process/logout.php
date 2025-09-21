<?php
session_start();

// Only clear the logged_in flag, keep user registration data
unset($_SESSION['logged_in']);

header("Location: ../pages/login.php?message=logged_out");
exit();
?>