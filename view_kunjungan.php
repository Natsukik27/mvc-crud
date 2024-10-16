<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App | Kunjungan</title>
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
                            <a href="index.php?page=kunjungan" class="nav-link active">Kunjungan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row mt-3">
            <div class="col-sm">
                <h3>Tabel Kunjungan</h3>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="tambahkunjungan.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>ID Kunjungan</th>
                        <th>Nama Pasien</th>
                        <th>Nama Dokter</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Keluhan</th>
                        <th>Action</th>
                    </tr>
                    <?php if (isset($isiTabelKunjungan) && !empty($isiTabelKunjungan)): ?>
                        <?php $no = 1; // Inisialisasi nomor urut ?>
                        <?php foreach ($isiTabelKunjungan as $data): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['idKunjungan']; ?></td>
                                <td><?= $data['nmPasien']; ?></td>
                                <td><?= $data['nmDokter']; ?></td>
                                <td><?= $data['tglKunjungan']; ?></td>
                                <td><?= $data['keluhan']; ?></td>
                                <td>
                                    <a href="editkunjungan.php?edit=<?= $data['idKunjungan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus_kunjungan.php?idKunjungan=<?= $data['idKunjungan']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data kunjungan ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
