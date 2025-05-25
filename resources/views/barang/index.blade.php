<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .table td, .table th {
            vertical-align: middle;
        }
        .foto-barang {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="card p-4">
        <h2 class="mb-4 text-center text-primary">📦 Daftar Barang</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('barang.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle me-1"></i> Tambah Barang
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangs as $barang)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $barang->kode }}</span></td>
                            <td class="fw-semibold">{{ $barang->nama_barang }}</td>
                            <td class="text-muted">{{ \Illuminate\Support\Str::limit($barang->deskripsi, 50) }}</td>
                            <td class="text-success">Rp{{ number_format($barang->harga_satuan, 0, ',', '.') }}</td>
                            <td><span class="badge bg-info text-dark">{{ $barang->jumlah }}</span></td>
                            <td>
                                @if($barang->foto)
                                    <img src="{{ asset('storage/' . $barang->foto) }}" class="foto-barang" />
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-sm btn-info mb-1">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning mb-1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center text-muted">Tidak ada data barang.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
