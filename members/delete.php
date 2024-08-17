<?php
include '../config.php';

// Mengatur header untuk format JSON
header('Content-Type: application/json');

// Mengambil parameter ID dari query string
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$response = array(); // Array untuk menyimpan respons

if ($id > 0) {
    // Menyiapkan query DELETE
    $sql = "DELETE FROM member WHERE id=?";
    
    // Menyiapkan pernyataan SQL
    if ($stmt = $conn->prepare($sql)) {
        // Mengikat parameter
        $stmt->bind_param("i", $id);
        
        // Menjalankan pernyataan
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Member deleted successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error executing query: ' . $stmt->error;
        }
        
        // Menutup pernyataan
        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error preparing query: ' . $conn->error;
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid ID';
}

// Menutup koneksi
$conn->close();

// Mengirimkan respons JSON
echo json_encode($response);
?>
