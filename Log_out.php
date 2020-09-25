<?php
session_start();
unset($_SESSION['First_Name']);
unset($_SESSION['id']);
header("Location: home.php");
?>