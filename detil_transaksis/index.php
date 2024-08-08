<?php
include '../config.php';

$sql = "SELECT * FROM detil_transaksi";
$result = $conn->query($sql);
?>

<h2>Detil Transaksis List</h2>
<a href="create.php">Create New Detil Transaksi</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Transaksi</th>
        <th>Paket</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['id_transaksi'] . "</td>
                <td>" . $row['id_paket'] . "</td>
                <td>" . $row['qty'] . "</td>
                <td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
                    <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No detil transaksis found</td></tr>";
    }
    ?>
</table>