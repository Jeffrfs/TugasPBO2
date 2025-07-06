@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">🍱 Menu Katsu</h1>

    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div> 
    @endif

    <div class="row">
        @foreach(\App\Models\Barang::all() as $barang)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($barang->gambar)
                        <img src="{{ asset($barang->gambar) }}" class="card-img-top" style="height:200px; object-fit:cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $barang->nama }}</h5>
                        <p class="card-text mb-2">Rp {{ number_format($barang->harga, 0, ',', '.') }}</p>

                        <form method="POST" action="{{ route('keranjang.store') }}" class="mt-auto">
                            @csrf
                            <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                            <div class="input-group">
                                <input type="number" name="jumlah" value="1" class="form-control" min="1">
                                <div class="input-group-append">
                                    <button class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
