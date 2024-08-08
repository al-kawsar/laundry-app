<?php
include '../config.php';

$sql = "SELECT * FROM transaksi";
$result = $conn->query($sql);
?>

<h2>Transaksis List</h2>
<a href="create.php">Create New Transaksi</a>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Member</th>
        <th>Tanggal</th>
        <th>Batas Waktu</th>
        <th>Tanggal Bayar</th>
        <th>Status</th>
        <th>Dibayar</th>
        <th>User</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['id_member'] . "</td>
                <td>" . $row['tgl'] . "</td>
                <td>" . $row['batas_waktu'] . "</td>
                <td>" . $row['tgl_bayar'] . "</td>
                <td>" . $row['status'] . "</td>
                <td>" . $row['dibayar'] . "</td>
                <td>" . $row['id_user'] . "</td>
                <td>
                    <a href='edit.php?id=" . $row['id'] . "'>Edit</a>
                    <a href='delete.php?id=" . $row['id'] . "'>Delete</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='9'>No transaksis found</td></tr>";
    }
    ?>
</table>