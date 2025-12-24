<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman Buku</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
            min-height: 100vh;
        }
        .card {
            border-radius: 16px;
        }
        .form-control, .form-select {
            border-radius: 10px;
        }
        .btn {
            border-radius: 10px;
            padding: 10px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center py-5">
    <div class="col-md-6">
        <div class="card shadow-lg border-0">
            <div class="card-header bg-primary text-white text-center py-3">
                <h4 class="mb-0">
                    <i class="bi bi-book"></i> Form Peminjaman Buku
                </h4>
            </div>

            <div class="card-body p-4">
                <form action="{{ route('pinjam.store') }}" method="POST">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-3">
                        <label class="form-label">Nama Peminjam</label>
                        <input type="text" name="nama_peminjam" class="form-control" placeholder="Masukkan nama" required>
                    </div>

                    <!-- Kelas -->
                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select name="kelas" class="form-select" required>
                            <option value="">-- Pilih Kelas --</option>
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>

                    <!-- Nama Buku -->
                    <div class="mb-3">
                        <label class="form-label">Nama Buku</label>
                        <select name="nama_buku" class="form-select" required>
                            <option value="">-- Pilih Buku --</option>
                            <option value="Laravel Dasar">Laravel Dasar</option>
                            <option value="Pemrograman Web">Pemrograman Web</option>
                            <option value="Basis Data">Basis Data</option>
                        </select>
                    </div>

                    <!-- Jumlah -->
                    <div class="mb-3">
                        <label class="form-label">Jumlah Buku</label>
                        <input type="number" name="banyak_buku" class="form-control" min="1" required>
                    </div>

                    <!-- Lama -->
                    <div class="mb-4">
                        <label class="form-label">Lama Meminjam (Jam)</label>
                        <input type="number" name="lama_meminjam" class="form-control" min="1" required>
                    </div>

                    <!-- Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Simpan Data
                        </button>
                    </div>
                </form>
            </div>

            <div class="card-footer text-center text-muted small">
                Sistem Peminjaman Buku
            </div>
        </div>
    </div>
</div>

</body>
</html>
