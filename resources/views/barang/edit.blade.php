<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container py-5">
    <div class="card p-4 shadow-sm rounded">
        <h3 class="text-warning mb-4">Edit Barang</h3>
        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Kode</label>
                <input type="text" name="kode" class="form-control" value="{{ $barang->kode }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="3" required>{{ $barang->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Satuan</label>
                <input type="number" name="harga_satuan" class="form-control" value="{{ $barang->harga_satuan }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jumlah</label>
                <input type="number" name="jumlah" class="form-control" value="{{ $barang->jumlah }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto (upload baru untuk ganti)</label>
                <input type="file" name="foto" class="form-control">
                @if($barang->foto)
                    <img src="{{ asset('storage/' . $barang->foto) }}" class="mt-2" style="width: 100px;">
                @endif
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
</body>
</html>
