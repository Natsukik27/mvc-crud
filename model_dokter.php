<?php
include 'model_pasien.php'; // Menginclude model_pasien.php untuk mendapatkan fungsi koneksi

// Fungsi untuk mengambil data dari tabel dokter
function getTabelDokter() {
    $link = koneksi(); // Memanggil fungsi koneksi
    $query = "SELECT * FROM dokter"; // Query SQL
    $result = mysqli_query($link, $query);
    
    return mysqli_fetch_all($result, MYSQLI_ASSOC); // Mengembalikan semua data dokter
}
?>
