<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tlp = $_POST['tlp'];

    $sql = "INSERT INTO member (nama, alamat, jenis_kelamin, tlp) VALUES ('$nama', '$alamat', '$jenis_kelamin', '$tlp')";
    if ($conn->query($sql) === TRUE) {
        echo "New member created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="">
    Nama: <input type="text" name="nama" required><br>
    Alamat: <textarea name="alamat" required></textarea><br>
    Jenis Kelamin:
    <select name="jenis_kelamin">
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select><br>
    Telepon: <input type="text" name="tlp" required><br>
    <button type="submit">Create</button>
</form>