@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>📦 Daftar Barang</h4>
    <a href="{{ route('barang.create') }}" class="btn btn-success">+ Tambah Barang</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-warning">
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->nama }}</td>
                    <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->deskripsi }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin ingin hapus barang ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">🗑️ Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
