<?php
include '../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM user WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "User deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: index.php");
