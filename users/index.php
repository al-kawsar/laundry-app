<?php
include '../config.php';

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>

<h2>Users List</h2>
<a href="create.php">Create New User</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nama'] . "</td>
                <td>" . $row['username'] . "</td>
                <td>" . $row['role'] . "</td>
                <td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
                    <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No users found</td></tr>";
    }
    ?>
</table>