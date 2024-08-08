<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
include 'config.php';
?>

<h1>Welcome to Laundry Management System</h1>
<a href="members/index.php">Manage Members</a><br>
<a href="users/index.php">Manage Users</a><br>
<a href="pakets/index.php">Manage Pakets</a><br>
<a href="transaksis/index.php">Manage Transaksis</a><br>
<a href="detil_transaksis/index.php">Manage Detil Transaksis</a><br>
<a href="logout.php">Logout</a>