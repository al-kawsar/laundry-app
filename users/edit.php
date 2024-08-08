<?php
include '../config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $role = $_POST['role'];

    $sql = "UPDATE user SET nama='$nama', username='$username', role='$role' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM user WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form method="post" action="">
    Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
    Username: <input type="text" name="username" value="<?php echo $row['username']; ?>" required><br>
    Role:
    <select name="role">
        <option value="admin" <?php if ($row['role'] == 'admin')
            echo 'selected'; ?>>Admin</option>
        <option value="kasir" <?php if ($row['role'] == 'kasir')
            echo 'selected'; ?>>Kasir</option>
    </select><br>
    <button type="submit">Update</button>
</form>