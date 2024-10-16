<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App | Dokter</title>
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
                            <a href="index.php?page=dokter" class="nav-link active">Dokter</a>
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
                <h3>Tabel Dokter</h3>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="tambahdokter.php" class="btn btn-primary btn-sm d-flex justify-content-center">Tambah Data</a>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>No</th>
                        <th>ID Dokter</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Action</th>
                    </tr>
                    <?php if (isset($isiTabelDokter) && !empty($isiTabelDokter)): ?>
                        <?php $no = 1; // Inisialisasi nomor urut ?>
                        <?php foreach ($isiTabelDokter as $data): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['idDokter']; ?></td>
                                <td><?= $data['nmDokter']; ?></td>
                                <td><?= $data['spesialis']; ?></td>
                                <td>
                                    <a href="editdokter.php?edit=<?= $data['idDokter']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="hapus_dokter.php?idDokter=<?= $data['idDokter']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data dokter ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
