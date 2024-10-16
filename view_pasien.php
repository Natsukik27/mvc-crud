<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App | Halaman Utama</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a href="index.php?page=pasien" class="navbar-brand">My App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="index.php?page=pasien" class="nav-link">Pasien</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=dokter" class="nav-link">Dokter</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?page=kunjungan" class="nav-link">Kunjungan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row mt-3">
            <div class="col-sm">
                <h3>Tabel Pasien</h3>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="tambahpasien.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover tabel-sm">
                    <tr>
                        <th>No</th>
                        <th>ID Pasien</th>
                        <th>Nama Pasien</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Action</th>
                    </tr>
                    <?php if (isset($isiTabelPasien) && !empty($isiTabelPasien)): ?>
                        <?php $no = 1; // Inisialisasi nomor urut ?>
                        <?php foreach ($isiTabelPasien as $data): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['idPasien']; ?></td>
                                <td><?= $data['nmPasien']; ?></td>
                                <td><?= $data['jk']; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td>
                                    <a href="editpasien.php?edit=<?= $data['idPasien']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus_pasien.php?idPasien=<?= $data['idPasien']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data pasien ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
