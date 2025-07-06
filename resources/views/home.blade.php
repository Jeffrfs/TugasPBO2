@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Menu BeliKatsu</h1>
    <div class="row">
        @foreach ($barangs as $barang)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama }}</h5>
                        <p class="card-text">Harga: Rp{{ number_format($barang->harga, 0, ',', '.') }}</p>
                        <form action="{{ route('keranjang.store') }}" method="POST" class="d-flex justify-content-between align-items-center">
                            @csrf
                            <input type="hidden" name="barang_id" value="{{ $barang->id }}">
                            <div class="input-group me-2" style="width: 100px;">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="decrement(this)">-</button>
                                <input type="number" name="jumlah" value="1" min="1" class="form-control form-control-sm text-center">
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="increment(this)">+</button>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@push('scripts')
<script>
    function increment(btn) {
        const input = btn.parentElement.querySelector('input[name="jumlah"]');
        input.value = parseInt(input.value) + 1;
    }

    function decrement(btn) {
        const input = btn.parentElement.querySelector('input[name="jumlah"]');
        if (parseInt(input.value) > 1) {
            input.value = parseInt(input.value) - 1;
        }
    }
</script>
@endpush
