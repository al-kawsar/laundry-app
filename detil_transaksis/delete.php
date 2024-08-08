<?php
include '../config.php';

$id = $_GET['id'];

$sql = "DELETE FROM detil_transaksi WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo "Detil Transaksi deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: index.php");
