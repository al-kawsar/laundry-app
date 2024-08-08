<?php
include '../config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_member = $_POST['id_member'];
    $tgl = $_POST['tgl'];
    $batas_waktu = $_POST['batas_waktu'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $status = $_POST['status'];
    $dibayar = $_POST['dibayar'];
    $id_user = $_POST['id_user'];

    $sql = "UPDATE transaksi SET id_member='$id_member', tgl='$tgl', batas_waktu='$batas_waktu', tgl_bayar='$tgl_bayar', status='$status', dibayar='$dibayar', id_user='$id_user' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Transaksi updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM transaksi WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$members = $conn->query("SELECT * FROM member");
$users = $conn->query("SELECT * FROM user");
?>

<form method="post" action="">
    Member:
    <select name="id_member">
        <?php while ($member = $members->fetch_assoc()): ?>
            <option value="<?php echo $member['id']; ?>" <?php if ($row['id_member'] == $member['id'])
                   echo 'selected'; ?>>
                <?php echo $member['nama']; ?>
            </option>
        <?php endwhile; ?>
    </select><br>
    Tanggal: <input type="date" name="tgl" value="<?php echo $row['tgl']; ?>" required><br>
    Batas Waktu: <input type="date" name="batas_waktu" value="<?php echo $row['batas_waktu']; ?>" required><br>
    Tanggal Bayar: <input type="date" name="tgl_bayar" value="<?php echo $row['tgl_bayar']; ?>" required><br>
    Status:
    <select name="status">
        <option value="baru" <?php if ($row['status'] == 'baru')
            echo 'selected'; ?>>Baru</option>
        <option value="proses" <?php if ($row['status'] == 'proses')
            echo 'selected'; ?>>Proses</option>
        <option value="selesai" <?php if ($row['status'] == 'selesai')
            echo 'selected'; ?>>Selesai</option>
        <option value="diambil" <?php if ($row['status'] == 'diambil')
            echo 'selected'; ?>>Diambil</option>
    </select><br>
    Dibayar:
    <select name="dibayar">
        <option value="dibayar" <?php if ($row['dibayar'] == 'dibayar')
            echo 'selected'; ?>>Dibayar</option>
        <option value="belum_dibayar" <?php if ($row['dibayar'] == 'belum_dibayar')
            echo 'selected'; ?>>Belum Dibayar
        </option>
    </select><br>
    User:
    <select name="id_user">
        <?php while ($user = $users->fetch_assoc()): ?>
            <option value="<?php echo $user['id']; ?>" <?php if ($row['id_user'] == $user['id'])
                   echo 'selected'; ?>>
                <?php echo $user['nama']; ?>
            </option>
        <?php endwhile; ?>
    </select><br>
    <button type="submit">Update</button>
</form>