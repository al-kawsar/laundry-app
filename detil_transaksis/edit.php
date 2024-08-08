<?php
include '../config.php';

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_transaksi = $_POST['id_transaksi'];
    $id_paket = $_POST['id_paket'];
    $qty = $_POST['qty'];

    $sql = "UPDATE detil_transaksi SET id_transaksi='$id_transaksi', id_paket='$id_paket', qty='$qty' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Detil Transaksi updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT * FROM detil_transaksi WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$transaksis = $conn->query("SELECT * FROM transaksi");
$pakets = $conn->query("SELECT * FROM paket");
?>

<form method="post" action="">
    Transaksi:
    <select name="id_transaksi">
        <?php while ($transaksi = $transaksis->fetch_assoc()): ?>
            <option value="<?php echo $transaksi['id']; ?>" <?php if ($row['id_transaksi'] == $transaksi['id'])
                   echo 'selected'; ?>><?php echo $transaksi['id']; ?></option>
        <?php endwhile; ?>
    </select><br>
    Paket:
    <select name="id_paket">
        <?php while ($paket = $pakets->fetch_assoc()): ?>
            <option value="<?php echo $paket['id']; ?>" <?php if ($row['id_paket'] == $paket['id'])
                   echo 'selected'; ?>>
                <?php echo $paket['jenis']; ?>
            </option>
        <?php endwhile; ?>
    </select><br>
    Quantity: <input type="number" name="qty" value="<?php echo $row['qty']; ?>" required><br>
    <button type="submit">Update</button>
</form>