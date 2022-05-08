<?php
session_start();
if(!isset($_SESSION['loggedin'])) {
    header("location: ./loginPage.php");
}
?>