@extends('layouts.app')

@section('content')
<h4 class="mb-3">🆕 Tambah Barang</h4>

<form action="{{ route('barang.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
    </div>
    <button class="btn btn-primary">Simpan</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
</form>
@endsection
