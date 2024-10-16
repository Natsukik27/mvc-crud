<?php
// Routing sederhana untuk aplikasi
$halaman = isset($_GET['page']) ? $_GET['page'] : 'pasien';

switch ($halaman) {
    case 'pasien':
        include 'controller_pasien.php';
        break;
    case 'dokter':
        include 'controller_dokter.php';
        break;
    case 'kunjungan':
        include 'controller_kunjungan.php';
        break;
    default:
        include 'controller_pasien.php';  // Default ke halaman pasien
        break;
}
?>
