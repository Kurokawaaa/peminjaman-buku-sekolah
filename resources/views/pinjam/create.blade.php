<!DOCTYPE html>
<html>
<head>
    <title>CRUD Laravel - Web Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h2>Tambah Post Baru</h2>
    <form action="{{ route('pinjam.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Masukan Nama</label>
            <input type="text" name="nama_peminjam" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kelas</label>
            <input type="text" name="kelas" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Buku</label>
            <input type="text" name="nama_buku" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jumlah Buku</label>
            <input type="number" name="banyak_buku" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Lama Meminjam (Per Jam)</label>
            <input type="number" name="lama_meminjam" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan</button>
        
        
    </form>
</div>
</body>
</html>
