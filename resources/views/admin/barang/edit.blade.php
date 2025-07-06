@extends('layouts.app')

@section('content')
<h4 class="mb-3">✏️ Edit Barang</h4>

<form action="{{ route('barang.update', $barang->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama" value="{{ $barang->nama }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="harga" value="{{ $barang->harga }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" value="{{ $barang->stok }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ $barang->deskripsi }}</textarea>
    </div>
    <button class="btn btn-success">Update</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
