<?php
include 'model_pasien.php'; // Menginclude model_pasien.php untuk mendapatkan fungsi koneksi

// Fungsi untuk mengambil data dari tabel kunjungan
function getTabelKunjungan() {
    $link = koneksi(); // Memanggil fungsi koneksi
    $query = "SELECT kunjungan.idKunjungan, pasien.nmPasien, dokter.nmDokter, kunjungan.tglKunjungan, kunjungan.keluhan
              FROM kunjungan
              JOIN pasien ON kunjungan.idPasien = pasien.idPasien
              JOIN dokter ON kunjungan.idDokter = dokter.idDokter";
    $result = mysqli_query($link, $query);
    
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
