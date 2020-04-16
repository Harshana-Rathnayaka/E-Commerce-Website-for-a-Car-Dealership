<?php
session_start();

if (isset($_GET['logout'])) {
    $usertype = $_SESSION['UserType'];
    if ($usertype == 0) {
        session_destroy();
        header('location:login/login-page.php');
    } elseif ($usertype == 1) {
        session_destroy();
        header('location:dealership/index.php');
    }
}
