<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        .select2-container--default .select2-selection--single {
            height: 38px;
            padding: 6px 12px;
            border: 1px solid #ced4da;
            border-radius: 10px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 24px;
            padding-left: 0;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 36px;
            right: 10px;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            height: 38px;
            padding: 6px 12px;
            border-radius: 10px;
            border: 1px solid #ced4da;
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

                    <select name="kode_buku" id="buku" class="form-select" required></select>
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

                    <!-- EMail -->
                    <div class="mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
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

<script>
$(document).ready(function() {
    $('#buku').select2({
        placeholder: 'Ketik nama buku...',
        allowClear: true,
        minimumInputLength: 1,
        ajax: {
            url: '{{ route("ajax.books") }}',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            }
        }
    });
});
</script>


</body>
</html>
