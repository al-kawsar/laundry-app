<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $sql = "INSERT INTO user (nama, username, password, role) VALUES ('$nama', '$username', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "New user registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="">
    Nama: <input type="text" name="nama" required><br>
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    Role:
    <select name="role">
        <option value="admin">Admin</option>
        <option value="kasir">Kasir</option>
    </select><br>
    <button type="submit">Register</button>
</form>