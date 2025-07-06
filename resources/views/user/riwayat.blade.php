@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">📜 Riwayat Transaksi</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($transaksis as $transaksi)
        <div class="card mb-3">
            <div class="card-header">
                Transaksi #{{ $transaksi->id }} |
                <small>{{ $transaksi->created_at->format('d M Y H:i') }}</small>
                <br>
                <strong>Total: Rp {{ number_format($transaksi->total, 0, ',', '.') }}</strong>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($transaksi->details as $detail)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $detail->barang->nama }}
                            <span>{{ $detail->jumlah }} x Rp {{ number_format($detail->barang->harga, 0, ',', '.') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @empty
        <p class="text-muted text-center">Belum ada transaksi.</p>
    @endforelse
</div>
@endsection
