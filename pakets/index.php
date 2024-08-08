<?php
include '../config.php';

$sql = "SELECT * FROM paket";
$result = $conn->query($sql);
?>

<h2>Pakets List</h2>
<a href="create.php">Create New Paket</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Jenis</th>
        <th>Harga</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['jenis'] . "</td>
                <td>" . $row['harga'] . "</td>
                <td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
                    <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No pakets found</td></tr>";
    }
    ?>
</table>