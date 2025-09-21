<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Check if user exists in session (from signup) AND credentials match
    if (isset($_SESSION['user']) &&
        $_SESSION['user']['username'] === $username &&
        $_SESSION['user']['password'] === $password) {

        // ONLY NOW set login flag to true
        $_SESSION['logged_in'] = true;

        // Redirect to protected page
        header("Location: ../pages/protected-page.php");
        exit();
    } else {
        // Wrong credentials or no user registered → back to login with error
        header("Location: ../pages/login.php?error=invalid");
        exit();
    }
} else {
    // Invalid request method
    header("Location: ../pages/login.php?error=request");
    exit();
}
?>