<?php
session_start();
include '../config.php';

$response = array('results' => '', 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $sql = "SELECT * FROM member";
    $result = $conn->query($sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            "id" => $row['id'],
            "nama" => $row['nama'],
            "alamat" => strlen($row['alamat']) < 15 ? $row['alamat'] : substr($row['alamat'], 0, 15) . '...',
            "jenis_kelamin" => $row['jenis_kelamin'],
            "tlp" => $row['tlp'],
        ];
    }


    $response['message'] = 'Get all members.';
    $response['results'] = $data;


} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
