<?php
session_start();
include 'config.php';

$response = array('status' => '', 'message' => '');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        $response['status'] = 'success';
        $response['message'] = 'Login successful.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid username or password.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method.';
}

// Return the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>