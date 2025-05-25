<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container py-5">
    <div class="card p-4 shadow-sm rounded">
        <h3 class="text-primary mb-4">Tambah Barang</h3>
        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kode</label>
                <input type="text" name="kode" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Satuan</label>
                <input type="number" name="harga_satuan" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
</body>
</html>
