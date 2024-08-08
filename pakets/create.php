<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO paket (jenis, harga) VALUES ('$jenis', '$harga')";
    if ($conn->query($sql) === TRUE) {
        echo "New paket created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="post" action="">
    Jenis:
    <select name="jenis">
        <option value="kiloan">Kiloan</option>
        <option value="selimut">Selimut</option>
        <option value="bed_cover">Bed Cover</option>
        <option value="kaos">Kaos</option>
    </select><br>
    Harga: <input type="number" name="harga" required><br>
    <button type="submit">Create</button>
</form>