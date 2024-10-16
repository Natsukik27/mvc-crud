<?php
// Fungsi untuk koneksi ke database
function koneksi() {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "pasien_mcv";
    
    return mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
}

// Fungsi untuk mengambil data dari tabel pasien
function getTabelPasien() {
    $link = koneksi();
    $query = "SELECT * FROM pasien";
    $result = mysqli_query($link, $query);
    
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
