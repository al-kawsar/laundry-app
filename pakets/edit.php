<?php
include '../config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $sql = "UPDATE paket SET jenis='$jenis', harga='$harga' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Paket updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM paket WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<form method="post" action="">
    Jenis:
    <select name="jenis">
        <option value="kiloan" <?php if ($row['jenis'] == 'kiloan')
            echo 'selected'; ?>>Kiloan</option>
        <option value="selimut" <?php if ($row['jenis'] == 'selimut')
            echo 'selected'; ?>>Selimut</option>
        <option value="bed_cover" <?php if ($row['jenis'] == 'bed_cover')
            echo 'selected'; ?>>Bed Cover</option>
        <option value="kaos" <?php if ($row['jenis'] == 'kaos')
            echo 'selected'; ?>>Kaos</option>
    </select><br>
    Harga: <input type="number" name="harga" value="<?php echo $row['harga']; ?>" required><br>
    <button type="submit">Update</button>
</form>