<?php
// koneksi.php

$host = "localhost"; // Host database
$user = "root"; // Username default di XAMPP
$password = ""; // Biarkan kosong jika tidak ada password
$dbname = "pasien_mcv"; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Memproses data dari form tambah pasien
if (isset($_POST['simpan'])) {
    $idPasien = $_POST['idPasien'];
    $nmPasien = $_POST['nmPasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO pasien (idPasien, nmPasien, jk, alamat) VALUES ('$idPasien', '$nmPasien', '$jk', '$alamat')";
    if ($conn->query($sql) === TRUE) {
        echo "Data pasien berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Memproses data dari form tambah dokter
if (isset($_POST['simpan1'])) {
    $idDokter = $_POST['idDokter'];
    $nmDokter = $_POST['nmDokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $noTelp = $_POST['noTelp'];

    $sql = "INSERT INTO dokter (idDokter, nmDokter, spesialis, noTelp) VALUES ('$idDokter', '$nmDokter', '$spesialisasi', '$noTelp')";
    if ($conn->query($sql) === TRUE) {
        echo "Data dokter berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Memproses data dari form tambah kunjungan
if (isset($_POST['simpan2'])) {
    $idKunjungan = $_POST['idKunjungan'];
    $idPasien = $_POST['idPasien'];
    $idDokter = $_POST['idDokter'];
    $tglKunjungan = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];

    $stmt = $conn->prepare("INSERT INTO kunjungan (idKunjungan, idPasien, idDokter, tglKunjungan, keluhan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiiss", $idKunjungan, $idPasien, $idDokter, $tglKunjungan, $keluhan); // 'iiiss' indicates data types

    if ($stmt->execute()) {
        echo "Data kunjungan berhasil ditambahkan";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Menutup koneksi
$conn->close();
?>
