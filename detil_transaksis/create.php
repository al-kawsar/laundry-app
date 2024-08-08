<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_transaksi = $_POST['id_transaksi'];
    $id_paket = $_POST['id_paket'];
    $qty = $_POST['qty'];

    $sql = "INSERT INTO detil_transaksi (id_transaksi, id_paket, qty) VALUES ('$id_transaksi', '$id_paket', '$qty')";
    if ($conn->query($sql) === TRUE) {
        echo "New detil transaksi created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$transaksis = $conn->query("SELECT * FROM transaksi");
$pakets = $conn->query("SELECT * FROM paket");
?>

<form method="post" action="">
    Transaksi:
    <select name="id_transaksi">
        <?php while ($transaksi = $transaksis->fetch_assoc()): ?>
            <option value="<?php echo $transaksi['id']; ?>"><?php echo $transaksi['id']; ?></option>
        <?php endwhile; ?>
    </select><br>
    Paket:
    <select name="id_paket">
        <?php while ($paket = $pakets->fetch_assoc()): ?>
            <option value="<?php echo $paket['id']; ?>"><?php echo $paket['jenis']; ?></option>
        <?php endwhile; ?>
    </select><br>
    Quantity: <input type="number" name="qty" required><br>
    <button type="submit">Create</button>
</form>