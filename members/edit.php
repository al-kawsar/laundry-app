<?php
include '../config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tlp = $_POST['tlp'];

    $sql = "UPDATE member SET nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tlp='$tlp' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Member updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM member WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form method="post" action="">
    Nama: <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required><br>
    Alamat: <textarea name="alamat" required><?php echo $row['alamat']; ?></textarea><br>
    Jenis Kelamin:
    <select name="jenis_kelamin">
        <option value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki')
            echo 'selected'; ?>>Laki-laki</option>
        <option value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan')
            echo 'selected'; ?>>Perempuan</option>
    </select><br>
    Telepon: <input type="text" name="tlp" value="<?php echo $row['tlp']; ?>" required><br>
    <button type="submit">Update</button>
</form>