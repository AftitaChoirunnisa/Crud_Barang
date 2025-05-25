<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detail Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container py-5">
    <div class="card shadow-sm p-4 rounded">
        <h3 class="mb-4 text-info">Detail Barang</h3>
        <div class="row">
            <div class="col-md-4 text-center">
                @if($barang->foto)
                    <img src="{{ asset('storage/' . $barang->foto) }}" class="img-fluid rounded" style="max-width: 100%;">
                @else
                    <p class="text-muted">Tidak ada foto</p>
                @endif
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Kode</th>
                        <td>{{ $barang->kode }}</td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td>{{ $barang->nama_barang }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $barang->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Harga Satuan</th>
                        <td>Rp{{ number_format($barang->harga_satuan, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>{{ $barang->jumlah }}</td>
                    </tr>
                </table>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
