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

    // Menggunakan prepared statement untuk keamanan dari SQL injection
    $stmt = $conn->prepare("INSERT INTO pasien (idPasien, nmPasien, jk, alamat) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $idPasien, $nmPasien, $jk, $alamat);

    if ($stmt->execute()) {
        echo "<script>
                alert('Data pasien berhasil ditambahkan');
                window.location.href='http://localhost/mvc-crud/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data pasien gagal ditambahkan: " . $stmt->error . "');
                window.location.href='http://localhost/mvc-crud/index.php';
              </script>";
    }

    $stmt->close();
}

// Memproses data dari form tambah dokter
if (isset($_POST['simpan1'])) {
    $idDokter = $_POST['idDokter'];
    $nmDokter = $_POST['nmDokter'];
    $spesialisasi = $_POST['spesialisasi'];
    $noTelp = $_POST['noTelp'];

    // Menggunakan prepared statement untuk keamanan
    $stmt = $conn->prepare("INSERT INTO dokter (idDokter, nmDokter, spesialis, noTelp) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $idDokter, $nmDokter, $spesialisasi, $noTelp);

    if ($stmt->execute()) {
        echo "<script>
                alert('Data dokter berhasil ditambahkan');
                window.location.href='http://localhost/mvc-crud/index.php?page=dokter';
              </script>";
    } else {
        echo "<script>
                alert('Data dokter gagal ditambahkan: " . $stmt->error . "');
                window.location.href='http://localhost/mvc-crud/index.php?page=dokter';
              </script>";
    }

    $stmt->close();
}

// Memproses data dari form tambah kunjungan
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

// Memproses data dari form tambah kunjungan
if (isset($_POST['simpan2'])) {
    $idKunjungan = trim($_POST['idKunjungan']);
    $idPasien = trim($_POST['idPasien']);
    $idDokter = trim($_POST['idDokter']);
    $tglKunjungan = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];

    // Mengecek apakah idPasien dan idDokter valid
    $cekPasien = $conn->query("SELECT * FROM pasien WHERE idPasien = '$idPasien'");
    $cekDokter = $conn->query("SELECT * FROM dokter WHERE idDokter = '$idDokter'");

    // Validasi apakah idPasien dan idDokter ada di database
    if ($cekPasien->num_rows > 0 && $cekDokter->num_rows > 0) {
        // Siapkan statement untuk menambah kunjungan
        $stmt = $conn->prepare("INSERT INTO kunjungan (idKunjungan, idPasien, idDokter, tglKunjungan, keluhan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $idKunjungan, $idPasien, $idDokter, $tglKunjungan, $keluhan);

        // Eksekusi query dan cek apakah berhasil
        if ($stmt->execute()) {
            echo "<script>
                    alert('Data kunjungan berhasil ditambahkan');
                    window.location.href='http://localhost/mvc-crud/index.php?page=kunjungan';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: " . $stmt->error . "');
                    window.location.href='http://localhost/mvc-crud/index.php?page=kunjungan';
                  </script>";
        }

        // Menutup statement
        $stmt->close();
    } else {
        // Jika idPasien atau idDokter tidak ditemukan
        echo "<script>
                alert('Error: ID Pasien atau Dokter tidak ditemukan');
                window.location.href='http://localhost/mvc-crud/index.php?page=kunjungan';
              </script>";
    }
}

// Menutup koneksi
$conn->close();
?>
