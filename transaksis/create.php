<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_member = $_POST['id_member'];
    $tgl = $_POST['tgl'];
    $batas_waktu = $_POST['batas_waktu'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $status = $_POST['status'];
    $dibayar = $_POST['dibayar'];
    $id_user = $_POST['id_user'];

    $sql = "INSERT INTO transaksi (id_member, tgl, batas_waktu, tgl_bayar, status, dibayar, id_user) VALUES ('$id_member', '$tgl', '$batas_waktu', '$tgl_bayar', '$status', '$dibayar', '$id_user')";
    if ($conn->query($sql) === TRUE) {
        echo "New transaksi created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$members = $conn->query("SELECT * FROM member");
$users = $conn->query("SELECT * FROM user");
?>

<form method="post" action="">
    Member:
    <select name="id_member">
        <?php while ($member = $members->fetch_assoc()): ?>
            <option value="<?php echo $member['id']; ?>"><?php echo $member['nama']; ?></option>
        <?php endwhile; ?>
    </select><br>
    Tanggal: <input type="date" name="tgl" required><br>
    Batas Waktu: <input type="date" name="batas_waktu" required><br>
    Tanggal Bayar: <input type="date" name="tgl_bayar" required><br>
    Status:
    <select name="status">
        <option value="baru">Baru</option>
        <option value="proses">Proses</option>
        <option value="selesai">Selesai</option>
        <option value="diambil">Diambil</option>
    </select><br>
    Dibayar:
    <select name="dibayar">
        <option value="dibayar">Dibayar</option>
        <option value="belum_dibayar">Belum Dibayar</option>
    </select><br>
    User:
    <select name="id_user">
        <?php while ($user = $users->fetch_assoc()): ?>
            <option value="<?php echo $user['id']; ?>"><?php echo $user['nama']; ?></option>
        <?php endwhile; ?>
    </select><br>
    <button type="submit">Create</button>
</form>