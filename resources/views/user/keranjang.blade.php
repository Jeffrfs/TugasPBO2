@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Keranjang Saya</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($keranjangs->isEmpty())
        <div class="alert alert-info">Keranjang kamu masih kosong.</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($keranjangs as $item)
                    @php $subtotal = $item->jumlah * $item->barang->harga; $total += $subtotal; @endphp
                    <tr>
                        <td>{{ $item->barang->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>Rp{{ number_format($item->barang->harga, 0, ',', '.') }}</td>
                        <td>Rp{{ number_format($subtotal, 0, ',', '.') }}</td>
                        <td>
                            <form action="{{ route('keranjang.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><strong>Total</strong></td>
                    <td><strong>Rp{{ number_format($total, 0, ',', '.') }}</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Checkout Sekarang</button>
        </form>
    @endif
</div>
@endsection