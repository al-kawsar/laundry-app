<?php
include '../config.php';

$sql = "SELECT * FROM member";
$result = $conn->query($sql);
?>

<h2>Members List</h2>
<a href="create.php">Create New Member</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Telepon</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nama'] . "</td>
                <td>" . $row['alamat'] . "</td>
                <td>" . $row['jenis_kelamin'] . "</td>
                <td>" . $row['tlp'] . "</td>
                <td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
                    <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No members found</td></tr>";
    }
    ?>
</table>